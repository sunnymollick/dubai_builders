<div style='font-family:Tahoma;font-size:12px;color: #333333;background-color:#FFFFFF;padding: 10px'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' style='height:50px; width:100%;font-size:12px;'>
        <tr>
            <td valign='top'>
                <table width='50%' align="left" cellspacing='0' cellpadding='0' style="margin-top:20px; margin-left:10px">
                    <tr>
                        <td valign='bottom' width='50%'>
                            <div align='left'><img height="100px" width="130" src='{{ asset($company_details->app_logo) }}' />
                            </div><br />
                        </td>

                        <td width='50%'>&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="font-size: 15px red; font-weight:bold; color:red; padding-left:10px">
                            {{$company_details->app_name}}
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 13px; padding-left:10px">
                            {{$company_details->address}}
                        </td>
                    </tr>
                    <tr>
                        <td width="100%" style="font-size: 13px; padding-left:10px">
                            {{$company_details->email}}, {{$company_details->phone_1}}
                        </td>
                    </tr>
                </table>
                <!-- <div style="background-color: yellowgreen; width: 50%"><b>Bill To:</b></div><br /> -->

                <table width='45%' align="right" cellspacing='0' cellpadding='5' style="margin-top:80px">
                    <tr>
                        <td valign='top' width='30%' style='padding-left: 10px;font-size:12px; background-color:yellowgreen'><b>Quotation To: </b>


                        </td>
                        <td valign='top' width='30%' style='padding-left: 10px;font-size:12px;background-color:blanchedalmond; color:red;'>{{$client_details->company_name}}

                        </td>
                    </tr>
                    <tr>
                        <td valign='top' width='30%' style='padding-left: 10px;font-size:12px; background-color:yellowgreen'><b>Quotation ID: </b>


                        </td>
                        <td valign='top' width='30%' style='padding-left: 10px;font-size:12px;background-color:blanchedalmond;color:red;'>{{$quotationApplication->quotation_code}}

                        </td>
                    </tr>
                    <tr>
                        <td valign='top' width='30%' style='padding-left: 10px;font-size:12px; background-color:yellowgreen'><b>Customer ID: </b>


                        </td>
                        <td valign='top' width='30%' style='padding-left: 10px;font-size:12px;background-color:blanchedalmond; color:red;'>{{$client_details->client_code}}

                        </td>
                    </tr>
                    <tr>
                        <td valign='top' width='30%' style='padding-left: 10px;font-size:12px; background-color:yellowgreen'><b>Quotation Date: </b>


                        </td>
                        <td valign='top' width='30%' style='padding-left: 10px;font-size:12px;background-color:blanchedalmond'>{{$quotationApplication->created_at->format('d/m/Y')}}

                        </td>
                    </tr>
                </table>
                <table width='100%' height='50' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td>
                        </td>
                    </tr>
                </table>
                <table width='100%' cellspacing='0' cellpadding='10' border='1' bordercolor='#CCCCCC'>
                    <tr>

                        <td width='35%' bordercolor='#ccc' bgcolor='yellowgreen' style='font-size:14px; border-collapse:collapse; border-right: 1px solid gray'><strong>Description
                            </strong></td>
                        <td bordercolor='#ccc' bgcolor='yellowgreen' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray'><strong>Qty</strong></td>
                        <td bordercolor='#ccc' bgcolor='yellowgreen' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray'><strong>Unit</strong>
                        </td>
                        <td bordercolor='#ccc' bgcolor='yellowgreen' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray'><strong>Unit Price</strong>
                        </td>
                        <td bordercolor='#ccc' bgcolor='yellowgreen' style='font-size:12px;; text-align: right'><strong>Subtotal</strong></td>

                    </tr>

                    <tr style="display:none;">
                        <td colspan="*">
                            @foreach ($groupedDetails as $category => $categoryDetails)
                            @php
                            $categoryTitle = $categoryDetails->first()->category->title;
                            @endphp
                    <tr>
                        <td colspan="5" style="background-color:blanchedalmond;">
                            {{ $categoryTitle }}
                        </td>
                    </tr>
                    @foreach($categoryDetails as $info)
                    <tr>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info->item->item_work }}</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info->quantity }}</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info->unit }}</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ number_format($info->unit_price,2) }}</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse;  border-bottom: 1px solid gray; border-top: 1px solid gray;; text-align: right'>{{ number_format($info->total_price,2) }}</td>
                    </tr>

                    @endforeach
                    @endforeach
                    @if($quotationApplication->discount_amount && $quotationApplication->tax)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='color:red; font-weight:bold; font-size:12px; border-collapse:collapse;'>Sub Total</td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse;; text-align: right'>{{$subTotalFormatted}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse;'>Discount</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray ; border-left: 1px solid gray; text-align: right'>{{$quotationApplication->discount_amount}}</td>
                    </tr>
                    @php
                    $afterDiscount = $subTotal - $quotationApplication->discount_amount;
                    $after_Discount = $afterDiscount
                    @endphp
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse;'>Total</td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray ; border-left: 1px solid gray; text-align: right'>{{$after_Discount}}</td>
                    </tr>
                    @php
                    $tax_amount = ($quotationApplication->tax*$afterDiscount)/100;
                    $grandTotal = $afterDiscount + $tax_amount;
                    @endphp
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse;'>TAX({{$quotationApplication->tax}}%)</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray ; border-left: 1px solid gray; text-align: right'>{{number_format($tax_amount,2)}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse;'>Grand Total</td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray ; border-left: 1px solid gray; text-align: right'>{{number_format($grandTotal,2)}}</td>
                    </tr>
                    @elseif($quotationApplication->discount_amount)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='color:red; font-weight:bold; font-size:12px; border-collapse:collapse;'>Sub Total</td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray ; border-left: 1px solid gray; text-align: right'>{{$subTotalFormatted}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse;'>Discount</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray ; border-left: 1px solid gray; text-align: right'>{{$quotationApplication->discount_amount}}</td>
                    </tr>
                    @php
                    $afterDiscount = $subTotalFormatted - $quotationApplication->discount_amount;
                    @endphp
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse;'>Grand Total</td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray ; border-left: 1px solid gray; text-align: right'>{{$afterDiscount}}</td>
                    </tr>
                    @elseif($quotationApplication->tax)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='color:red; font-weight:bold; font-size:12px; border-collapse:collapse;'>Sub Total</td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray ; border-left: 1px solid gray; text-align: right'>{{$subTotalFormatted}}</td>
                    </tr>
                    @php
                    $tax_amount = ($quotationApplication->tax*$subTotalFormatted)/100;
                    $grandTotal = $subTotalFormatted + $tax_amount;
                    @endphp
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse;'>TAX({{$quotationApplication->tax}}%)</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray ; border-left: 1px solid gray; text-align: right'>{{$tax_amount}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse;'>Grand Total</td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray ; border-left: 1px solid gray; text-align: right'>{{$grandTotal}}</td>
                    </tr>
                    @else
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='color:red; font-weight:bold; font-size:12px; border-collapse:collapse;'>Grand Total</td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray ; border-left: 1px solid gray; text-align: right'>{{$subTotalFormatted}}</td>
                    </tr>
                    @endif
            </td>
        </tr>
    </table>

    @if($quotationApplication->terms_conditions)
    <br>
    <br>
    <table width='100%' cellspacing='0' cellpadding='10' border='1' bordercolor='#CCCCCC'>
        <tr>

            <td width='35%' bordercolor='#ccc' bgcolor='yellowgreen' style='font-size:14px; border-collapse:collapse; border-right: 1px solid gray'><strong>TERMS & CONDITIONS
                </strong>
            </td>

        </tr>
        <tr>
            <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray ; border-left: 1px solid gray;'>{{ $quotationApplication->terms_conditions }}</td>
        </tr>
    </table>
    @endif
    </td>
    </tr>
    </table>
</div>



<!-- {"id":17,"quotation_request_id":7,"quotation_code":"QT-2024017","tax":null,"discount_percentage":null,
"discount_amount":null,"grand_total":98240,"terms_conditions":null,
"created_at":"2024-01-30T11:21:36.000000Z","updated_at":"2024-01-30T11:21:36.000000Z",
"quotation_details":[{"id":22,"quotation_id":17,"item_id":2,"category_id":3,"unit":"No.",
"quantity":6,"unit_price":4000,"total_price":24000,"created_at":"2024-01-30T11:21:36.000000Z",
"updated_at":"2024-01-30T11:21:36.000000Z"},{"id":23,"quotation_id":17,"item_id":5,"category_id":5,
"unit":"Hour","quantity":8,"unit_price":780,"total_price":6240,
"created_at":"2024-01-30T11:21:36.000000Z","updated_at":"2024-01-30T11:21:36.000000Z"},
{"id":24,"quotation_id":17,"item_id":2,"category_id":3,"unit":"No.","quantity":17,"unit_price":4000,
"total_price":68000,"created_at":"2024-01-30T11:21:36.000000Z",
"updated_at":"2024-01-30T11:21:36.000000Z"}]} -->