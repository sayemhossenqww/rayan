<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Line;
use App\Models\CoffeeBag;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ManupackController extends Controller
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

        $totalRecords = CoffeeBag::select('count(*) as allcount')->count();   // Total records
        $iTotalDisplayRecords = CoffeeBag::select('count(*) as allcount')->search($searchValue)->count();

        // Fetch records
        $records = CoffeeBag::search($searchValue)
            ->orderBy($columnName == 'sort_number' ? 'sort_order' : $columnName, $columnSortOrder)
            ->skip($start)
            ->take($length)
            ->get();

        $aaData = array();

        foreach ($records as $record) {
            $aaData[] = array(
                "id" => $record->id,
                "product_type" => $record->product_type,
                "bbag_num" => $record->bbag_num,
                "jar_num" => $record->jar_num,
                "total_amount" => $record->total_amount,
                "bigcon_num" => $record->bigcon_num,
                "smallcon_num" => $record->smallcon_num,
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
