<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\StaffAttendance;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StaffAttendanceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request, ?string $year = 'now', ?string $month = 'now', ?string $day = 'now'): View
    {
        if ($year == 'now') {
            $month = Carbon::now()->format('m'); 
            $year = Carbon::now()->format('y');
            $day = Carbon::now()->format('d');
        }
        $staffs = Staff::orderBy('order')->paginate(20);
        $attendances = [];

        foreach ($staffs as $key => $value) {
            $attendances[$value->id] = $value->getAttendance($year, $month);
        }
        
        return view('attendances.index', [
            'staffs' => $staffs,
            'month' => $month,
            'year' => $year,
            'day' => $day,
            'attendances' => $attendances
        ]);
    }

    public function show(Request $request, StaffAttendance $attendance, ?string $day = 'now'): View
    {
        try {
            if ($day === 'now') {
                $day = Carbon::now()->format('d');
            } else {
                // Attempt to parse the day to ensure it is a valid date string
                $dayParsed = Carbon::parse($day);
                // You might want to format it as needed:
                $day = $dayParsed->format('d');
            }
        } catch (\Exception $e) {
            // If parsing fails, default back to 'now' or handle error as needed
            // This could also be an alert or log entry depending on your error strategy
            $day = Carbon::now()->format('d');
        }
        // dd($day);
        // if ($day == 'now') {
        //     $day = Carbon::now()->format('d');
        // }
        return view('attendances.show', [
            'day' => $day,
            'attendance' => $attendance
        ]);
    }

    public function update(Request $request, StaffAttendance $attendance)
    {
        $request->validate([
            'day' => ['required', 'string', 'max:2'],
            'in' => ['nullable', 'string', 'min:0'],
            'out' => ['nullable', 'string', 'min:0']
        ]);

        $in = 'in_'.$request->day;
        $out = 'out_'.$request->day;
        $attendance->$in = $request->in;
        $attendance->$out = $request->out;
        $attendance->save();

        return back()->with('success', __('Updated'));
    }

    public function out(Request $request, StaffAttendance $attendance)
    {
        $day = Carbon::now()->format('d');

        $out = 'out_'.$day;
        $attendance->$out = Carbon::now()->isoFormat('hh:mm:ss');
        $attendance->save();

        return back()->with('success', __('Out Updated'));
    }

    public function in(Request $request, StaffAttendance $attendance)
    {
        // dd($attendance);
        $day = Carbon::now()->format('d');

        $in = 'in_'.$day;
        $attendance->$in = Carbon::now()->isoFormat('hh:mm:ss');
        $attendance->save();

        return back()->with('success', __('In Updated'));
    }
}