<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        //dd($request->get('category'));
        $columnIndex = $order[0]['column']; // Column index
        $columnName = $columns[$columnIndex]['data']; // Column name
        $columnSortOrder = $order[0]['dir']; // asc or desc
        $searchValue = $search['value']; // Search value

        $totalRecords = Product::select('count(*) as allcount')->count();   // Total records
        $iTotalDisplayRecords = Product::select('count(*) as allcount')->search($searchValue)->count();

        // Fetch records
        $records = Product::with('category')
            ->search($searchValue)
            ->orderBy($columnName, $columnSortOrder)
            ->skip($start)
            ->take($length)
            ->get();


        $aaData = array();
        foreach ($records as $record) {
            $aaData[] = array(
                "id" => $record->id,
                "image" => $record->image_url,
                "name" => $record->full_name,
                "description" => $record->description,
                "category" => $record->category->name,
                "cost" => $record->table_view_cost,
                // "expiry_date" => Carbon::parse($record->expiry_date)->format($dateFormat),
                "expiry_date" => $record->expiry_date_view,
                "whole_cost" => $record->whole_cost,
                // "sale_price" => $record->table_view_price,
                // "retailsale_price" => $record->table_view_price,
                // "sales_price" => $record->table_sales_view_price,
                // "wholesale_price" => $record->table_wholesale_view_price,
                "unit_price" => $record->view_price,
                "wholeunit_price" => $record->view_wholeprice,
                "box_price" => $record->table_box_view_price,
                "wholebox_price" => $record->table_box_view_wholeprice,
                "wholesale_price" => $record->table_wholesale_view_price,
                // "price_per_gram" => $record->table_price_per_gram,
                // "price_per_kilogram" => $record->table_price_per_kilogram,
                "in_stock" => $record->track_stock ? $record->in_stock.' '.$record->cost_unit : 'N/A',
                "is_active" => $record->is_active,
                "status" => $record->status,
                "status_badge_bg_color" => $record->status_badge_bg_color,
                "created_at" => $record->created_at,
                
                "cost_plain" => $record->cost,
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
}