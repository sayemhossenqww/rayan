<?php

namespace App\Http\Controllers;

use App\Models\MilkDetail;
use App\Models\Staff;
use App\Models\StaffAttendance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Carbon;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        $staffs = Staff::search($request->search_query)->orderBy('order')->paginate(20);
        return view('staffs.index', [
            'staffs' => $staffs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'order' => ['nullable', 'numeric', 'min:0']
        ]);

        $staff = new Staff();
        $staff->name = $request->name;
        $staff->order = $request->order;
        $staff->save();

        return Redirect::back()->with("success", __("Created"));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Staff $staff): RedirectResponse
    {
        $staff->delete();
        return Redirect::back()->with("success", __("Deleted"));
    }

    public function edit(Staff $staff): View
    {
        return view("staffs.edit", [
            'staff' => $staff,
        ]);
    }
    
    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'order' => ['nullable', 'numeric', 'min:0']
        ]);


        $staff->name = $request->name;
        $staff->order = $request->order;
        $staff->save();

        return back()->with('success', __('Updated'));
    }

    public function attendance(Staff $staff, ?string $year = 'now', ?string $month = 'now'): View
    {
        if ($year == 'now') {
            $month = Carbon::now()->format('m'); 
            $year = Carbon::now()->format('y');
        }
        $attendance = $staff->getAttendance($year, $month);
        return view("staffs.attendance", [
            'staff' => $staff,
            'attendance' => $attendance,
            'month' => $month,
            'year' => $year
        ]);
    }

    public function milkDetail(Staff $staff, ?string $year = 'now', ?string $week = 'now'): View
    {
        if ($week == 'now') {
            $week = Carbon::now()->weekOfYear; 
            $year = Carbon::now()->format('y');
        }
        $details = $staff->getMilkDetail($year, $week);
        return view("staffs.milk_details", [
            'staff' => $staff,
            'details' => $details,
            'week' => $week,
            'year' => $year
        ]);
    }


    public function doAttendance(StaffAttendance $attendance, ?string $day = 'now'): View
    {
        if ($day == 'now') {
            $day = Carbon::now()->format('d');
        }
        return view("staffs.do_attendance", [
            'attendance' => $attendance,
            'day' => $day
        ]);
    }

    public function doMilkDetail(MilkDetail $milkDetail, ?string $day = 'now'): View
    {
        if ($day == 'now') {
            $day = Carbon::now()->dayOfWeek + 1;
        }
        return view("staffs.do_details", [
            'details' => $milkDetail,
            'day' => $day
        ]);
    }

    public function print(Staff $staff, ?string $year = 'now', ?string $month = 'now'): View
    {
        if ($year == 'now') {
            $month = Carbon::now()->format('m'); 
            $year = Carbon::now()->format('y');
        }
        $attendance = $staff->getAttendance($year, $month);
        return view("staffs.print", [
            'staff' => $staff,
            'attendance' => $attendance,
            'month' => $month,
            'year' => $year
        ]);
    }
}