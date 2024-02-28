<div style='font-family:Tahoma;font-size:12px;color: #333333;background-color:#FFFFFF;'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' style='height:50px; width:100%;font-size:12px;'>
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

                <table width='80%' cellspacing='0' cellpadding='0'>
                    <tr>
                        <table width='35%' align="left" cellspacing='0' cellpadding='5'>
                            <tr style="background-color: yellowgreen;font-size:15px; font-weight:bold; ">
                                <td>Quotation To:</td>

                            </tr>
                            <tr>
                                <td valign='top' style='font-size:14px; color:red; background-color:blanchedalmond'> <strong>{{$client_details->company_name}}</strong><br />
                                    <p style="color:black; font-size:12px">{{$client_details->address}}


                                </td>
                            </tr>
                        </table>
                        <!-- <table width='40%' align="right" cellspacing='0' cellpadding='3'>
                            <tr>
                                <td valign='top' width='30%' style='font-size:12px; background-color:yellowgreen'><b>Invoice Date: </b>


                                </td>
                                <td valign='top' width='30%' style='font-size:12px;background-color:blanchedalmond'>03/03/2021

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
                        </table> -->


                    </tr>
                </table>
                <table width='100%' height='100' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td>
                            <div align='center' style='font-size: 17px;font-weight: bold; color:red'>Quotation ID # </div>
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
                    @foreach($groupedData as $categoryData)

                    <tr>
                        <td colspan="5" style="background-color:blanchedalmond; font-size:14px; border-bottom: 1px solid gray;"><strong>{{ $categoryData['category']->title }}</strong></td>
                    </tr>
                    @foreach($categoryData['items'] as $info)

                    <tr>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info['item']->item_work }}</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info['quantity'] }}</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info['item']->unit->title }}</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info['unit_price'] }}</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse;  border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info['total_price'] }}</td>
                    </tr>
                    @endforeach
                    @endforeach
                    @if($discountAmount && $tax)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='color:red; font-weight:bold; font-size:12px; border-collapse:collapse;border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>Sub Total</td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{$subTotal}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse;border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>Discount</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{$discountAmount}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse;border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>Total</td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{$afterDiscount}}</td>
                    </tr>
                    @php
                    $tax_amount = ($tax*$afterDiscount)/100;
                    @endphp
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse;border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>TAX({{$tax}}%)</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{$tax_amount}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse;border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>Grand Total</td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{$grandTotal}}</td>
                    </tr>
                    @elseif($discountAmount)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='color:red; font-weight:bold;color:red; font-weight:bold;font-size:12px; border-collapse:collapse;border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>Sub Total</td>
                        <td valign='top' style='color:red; font-weight:bold;color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{$subTotal}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse;border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>Discount</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{$discountAmount}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='color:red; font-weight:bold;color:red; font-weight:bold;font-size:12px; border-collapse:collapse;border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>Grand Total</td>
                        <td valign='top' style='color:red; font-weight:bold;color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{$afterDiscount}}</td>
                    </tr>
                    @elseif($tax)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse;border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>Sub Total</td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{$subTotal}}</td>
                    </tr>
                    @php
                    $tax_amount = ($tax*$afterDiscount)/100;
                    @endphp
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse;border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>TAX({{$tax}}%)</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{$tax_amount}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse;border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>Grand Total</td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{$grandTotal}}</td>
                    </tr>
                    @else
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>Grand Total</td>
                        <td valign='top' style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{$grandTotal}}</td>
                    </tr>
                    @endif
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
                    Phone: {{$company_details->phone_1}}<br /></strong>

            </td>

            <td valign='top' width='34%' style='border-top:double medium #CCCCCC;font-size:12px;' align='right'><br />
            </td>
        </tr>
    </table>
    </td>
    </tr>
    </table>
</div>