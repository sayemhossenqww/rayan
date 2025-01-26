<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Salesman;
use App\Models\Root;
use App\Models\Line;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SalesmanController extends Controller
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

        $totalRecords = Salesman::select('count(*) as allcount')->count();   // Total records
        $iTotalDisplayRecords = Salesman::select('count(*) as allcount')->search($searchValue)->count();

        // Fetch records
        $records = Salesman::search($searchValue)
            ->orderBy($columnName == 'sort_number' ? 'sort_order' : $columnName, $columnSortOrder)
            ->skip($start)
            ->take($length)
            ->get();

        $aaData = array();

        foreach ($records as $record) {
            $aaData[] = array(
                "id" => $record->id,
                "salesman_name" => $record->salesman_name,
                "category" => $record->category,
                "quantity" => $record->quantity,
                "stock" => $record->stock,
                "retail_price" => $record->retail_price,
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
        $salesmen = Salesman::select('id', 'salesman_name')->get();
        $roots = Root::select('id', 'root_name')->get();
        $lines = Line::select('id', 'location')->get();
        return response()->json([
            'salesmen' => $salesmen,
            'roots' => $roots,
            'lines' => $lines
        ]);
    }
}