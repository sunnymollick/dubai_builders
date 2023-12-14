<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Mail\QuotationMail;
use App\Models\Backend\Item;
use App\Models\Backend\QuotationApplication;
use App\Models\Frontend\Quotation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
class QuotationController extends Controller
{
    public function fetchItems($id)
    {
        $item_work = Item::where('work_category_id', $id)->get();

        // Fetch unit details for each item
        $itemsWithDetails = $item_work->map(function ($item) {
            $unit = $item->unit()->first(); // Assuming 'unit' is the name of the relationship
            // Add 'unit' details to the item
            $item->unit = $unit;
            return $item;
        });
        return response()->json(['items' => $itemsWithDetails]);
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $path = "quotations";
            $rules = [
                'items' => 'required',
                'unit' => 'required',
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

                    $items = $request->input('items');
                    $units = $request->input('unit');
                    $quantities = $request->input('quantity');
                    $unitPrices = $request->input('unit_price');
                    $totalPrices = $request->input('total_price');
                    $description = $request->input('description');
                    $quo_id = $request->input('request_id');

                    // dd($quo_id);
                    $client_info = Quotation::findOrFail($quo_id);
                    // dd($client_info->email);
                    $content = [
                        'subject' => 'Here is Quotation on your request',
                        'body' => 'This is the quotation we made according to your requirement .'
                    ];

                    Mail::to($client_info->email)->send(new QuotationMail($content));

                    foreach ($items as $key => $value) {
                        $quotationApplication = new QuotationApplication();
                        $quotationApplication->quotation_request_id = $quo_id;
                        $quotationApplication->item_id = $value;
                        $quotationApplication->unit = $units[$key];
                        $quotationApplication->quantity = $quantities[$key];
                        $quotationApplication->unit_price = $unitPrices[$key];
                        $quotationApplication->total_price = $totalPrices[$key];
                        $quotationApplication->description = $description[$key];
                        $quotationApplication->save();
                    }

                    $quotation_request = Quotation::findOrFail($request->input('request_id'));
                    $quotation_request->is_replied = 1;
                    $quotation_request->save();

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
