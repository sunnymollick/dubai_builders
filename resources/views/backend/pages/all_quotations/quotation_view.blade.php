<div style='font-family:Tahoma;font-size:12px;color: #333333;background-color:#FFFFFF;'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' style='height:50px; width:595px;font-size:12px;'>
        <tr>
            <td valign='top'>
                <table width='100%' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td valign='bottom' width='50%' height='50'>
                            <div align='left'><img height="80px" width="120" src='{{ asset($company_details->app_logo) }}' />
                            </div><br />
                        </td>

                        <td width='50%'>&nbsp;</td>
                    </tr>
                </table>
                <!-- <div style="background-color: yellowgreen; width: 50%"><b>Bill To:</b></div><br /> -->

                <table width='100%' cellspacing='0' cellpadding='0'>
                    <tr>
                        <table width='40%' align="left" cellspacing='0' cellpadding='5'>
                            <tr style="background-color: yellowgreen;font-size:15px; font-weight:bold; ">
                                <td>Bill To:</td>

                            </tr>
                            <tr>
                                <td valign='top' style='font-size:14px; color:red; background-color:blanchedalmond'> <strong>{{$client_details->company_name}}</strong><br />
                                    <p style="color:black; font-size:12px">{{$client_details->address}} <br>
                                        [Client's company address line 2] <br /></p>


                                </td>
                            </tr>
                        </table>
                        <table width='40%' align="right" cellspacing='0' cellpadding='3'>
                            <tr>
                                <td valign='top' width='30%' style='font-size:12px; background-color:yellowgreen'><b>Invoice Date: </b>


                                </td>
                                <td valign='top' width='30%' style='font-size:12px;background-color:blanchedalmond'>{{$quotationApplication->created_at->format('d/m/Y')}}

                                </td>
                            </tr>
                            <tr>
                                <td valign='top' width='30%' style='font-size:12px; background-color:yellowgreen'>
                                    <b>Due Date:</b>


                                </td>
                                <td valign='top' width='30%' style='font-size:12px;background-color:blanchedalmond'>
                                    03/18/2021


                                </td>
                            </tr>
                        </table>


                    </tr>
                </table>
                <table width='100%' height='100' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td>
                            <div align='center' style='font-size: 17px;font-weight: bold; color:red'>Quotation ID # {{$quotationApplication->quotation_code}} </div>
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
                        <td bordercolor='#ccc' bgcolor='yellowgreen' style='font-size:12px;'><strong>Subtotal</strong></td>

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
                            <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info->unit_price }}</td>
                            <td valign='top' style='font-size:12px; border-collapse:collapse;  border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info->total_price }}</td>
                        </tr>
                        @endforeach
                    @endforeach
                    <tr>

                        <td valign='top' style='font-size:12px;'>&nbsp;</td>
                        <td valign='top' style='font-size:12px;'>&nbsp;</td>
                        <td valign='top' style='font-size:12px;'>&nbsp;</td>
                        <td valign='top' style='font-size:12px;'>&nbsp;</td>
                    </tr>
            </td>
        </tr>
    </table>
    <table width='100%' cellspacing='0' cellpadding='2' border='0'>
        <tr>
            <td style='font-size:12px;width:40%;'><strong></strong>
            </td>
            <td>
                <table width='100%' cellspacing='0' cellpadding='2' border='0'>
                    <tr>
                        <td align='right' style='font-size:12px;'>Subtotal</td>
                        <td align='right' style='font-size:12px;  color:tomato'>{{$quotationApplication->grand_total}}
                        <td>
                    </tr>
                    <tr>
                        <td align='right' style='font-size:12px;'>TAX({{$quotationApplication->tax}}%)</td>
                        <td align='right' style='font-size:12px; color:tomato'>$68.44</td>
                    </tr>
                    <tr>

                        <td align='right' style='font-size:12px;'><b>Total</b></td>
                        <td align='right' style='font-size:12px; color:tomato'><b>$1,163.44</b></td>
                    </tr>
                </table>
            </td>
            <td style='font-size:12px;width:10%;'><strong></strong>
            </td>
        </tr>
    </table>

    <table width='100%' height='50'>
        <tr>
            <td style='font-size:12px;text-align:justify;'></td>
        </tr>
    </table>
    <table width='100%' cellspacing='0' cellpadding='2'>
        <tr>
            <td width='33%' style='border-top:double medium #CCCCCC;font-size:15px; color:red' valign='top'><b>{{$company_details->app_name}}</b><br />


            </td>
            <td width='33%' style='border-top:double medium #CCCCCC; font-size:12px;' align='center' valign='top'>
                <strong>{{$company_details->address}}<br />
                    [Company address line 2] <br />
                    Phone: {{$company_details->phone_1}}<br /></strong>

            </td>

            <td valign='top' width='34%' style='border-top:double medium #CCCCCC;font-size:12px;' align='right'>[payment
                details]<br />
            </td>
        </tr>
    </table>
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