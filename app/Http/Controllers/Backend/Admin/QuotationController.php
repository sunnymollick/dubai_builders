<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\QuotationApplication;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuotationController extends Controller
{
    public function store(Request $request)
    {

        if ($request->ajax()) {
            $path = "quotations";
            $rules = [
                'item' => 'required',
                'unit_price' => 'required',
                'quantity' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {

                DB::beginTransaction();
                try {
                    $items = $request->input('item');
                    $quantities = $request->input('quantity');
                    $unitPrices = $request->input('unit_price');
                    $totaPrices = $request->input('total_price');
                    // Use a for loop to store the data
                    $request_id = $request->request_id;
                    for ($i = 0; $i < count($items); $i++) {
                        $new = new QuotationApplication();
                        $new->item = $items[$i];
                        $new->quotation_request_id = $request->request_id;
                        $new->quantity = $quantities[$i];
                        $new->unit_price = $unitPrices[$i];
                        $new->total_price = $totaPrices[$i];
                        $new->save();
                    }
                    DB::commit();
                    return response()->json(['type' => 'success', 'message' => "Successfully Inserted"]);
                } catch (Exception $e) {
                    DB::rollback();
                    dd($e->getMessage());
                    return response()->json(['type' => 'error', 'message' => "Please Fill With Correct data"]);
                }
            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }
}
