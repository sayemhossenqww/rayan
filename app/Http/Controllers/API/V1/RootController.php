<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Root;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class RootController extends Controller
{
    public function index(Request $request)
    {

        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $length = $request->get("length"); // Rows display per page

        $order = $request->get('order');
        $columns = $request->get('columns');
        $search = $request->get('search');
        $columnIndex = $order[0]['column']; // Column index
        $columnName = $columns[$columnIndex]['data']; // Column name
        $columnSortOrder = $order[0]['dir']; // asc or desc
        $searchValue = $search['value']; // Search value

        $totalRecords = Root::select('count(*) as allcount')->count();   // Total records
        $iTotalDisplayRecords = Root::select('count(*) as allcount')->search($searchValue)->count();

        // Fetch records
        $records = Root::search($searchValue)
            ->orderBy($columnName == 'sort_number' ? 'sort_order' : $columnName, $columnSortOrder)
            ->skip($start)
            ->take($length)
            ->get();

        $aaData = array();

        foreach ($records as $record) {
            $aaData[] = array(
                "id" => $record->id,
                "root_name" => $record->root_name,
                "area_name" => $record->area_name,
                "city_name" => $record->city_name,
                "created_at" => $record->created_at,
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $iTotalDisplayRecords,
            "aaData" => $aaData
        );

        return response()->json($response);
    }

    public function getSalesmen(): JsonResponse
    {
        // Fetch only the 'id' and 'name' fields from the Salesman model
        $salesmen = Root::select('id', 'salesman_name')->get();
        return response()->json($salesmen);
    }
}
