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
                        </table>


                    </tr>
                </table>
                <table width='100%' height='100' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td>
                            <div align='center' style='font-size: 17px;font-weight: bold; color:red'>Quotation ID # {{$quotation_details->first()->quotation_code}} </div>
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

                    @php
                    $currentCategory = null;
                    @endphp

                    @foreach($quotation_details as $info)
                    @if($info->item->work_category_id !== $currentCategory)
                    @php
                    $currentCategory = $info->item->work_category_id;
                    @endphp
                    <tr>
                        <td colspan="5" style="background-color:blanchedalmond; font-size:14px; border-bottom: 1px solid gray;"><strong>{{ $info->item->workcategory->title }}</strong></td>
                    </tr>
                    @endif

                    <tr>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info->item->item_work }}</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info->quantity }}</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info->unit }}</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info->unit_price }}</td>
                        <td valign='top' style='font-size:12px; border-collapse:collapse;  border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info->total_price }}</td>
                    </tr>
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
                        <td align='right' style='font-size:12px;  color:tomato'>{{$subtotal}}
                        <td>
                    </tr>
                    <tr>
                        <td align='right' style='font-size:12px;'>TAX(6.25%)</td>
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