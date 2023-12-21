<div style='font-family:Tahoma;font-size:12px;color: #333333;background-color:#FFFFFF;'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' style='height:50px; width:595px;font-size:12px;'>
        <tr>
            <td valign='top'>
                <table width='100%' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td valign='bottom' width='50%' height='50'>
                            <div align='left'><img src='#' />
                            </div><br />
                        </td>

                        <td width='50%'>&nbsp;</td>
                    </tr>
                </table>Bill To: <br /><br />
                <table width='100%' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td valign='top' width='35%' style='font-size:12px;'> <strong>{{$client_details->company_name}}</strong><br />
                            {{$client_details->address}}<br />
                            [Client's company address line 2] <br />

                        </td>
                        <td valign='top' width='35%'>
                        </td>
                        <td valign='top' width='30%' style='font-size:12px;'>Invoice Date: 03/03/2021<br />
                            Due Date: 03/18/2021 <br />


                        </td>

                    </tr>
                </table>
                <table width='100%' height='100' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td>
                            <div align='center' style='font-size: 14px;font-weight: bold;'>Quotation ID # {{$quotation_details->first()->quotation_code}} </div>
                        </td>
                    </tr>
                </table>
                <table width='100%' cellspacing='0' cellpadding='2' border='1' bordercolor='#CCCCCC'>
                    <tr>

                        <td width='35%' bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Description
                            </strong></td>
                        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Qty</strong></td>
                        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Unit</strong>
                        </td>
                        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Unit Price</strong>
                        </td>
                        <td bordercolor='#ccc' bgcolor='#f2f2f2' style='font-size:12px;'><strong>Subtotal</strong></td>

                    </tr>
                    <tr style="display:none;">
                        <td colspan="*">
                            @foreach($quotation_details as $info)
                    <tr>

                        <td valign='top' style='font-size:12px;'>{{$info->item->item_work}}</td>
                        <td valign='top' style='font-size:12px;'>{{$info->quantity}}</td>
                        <td valign='top' style='font-size:12px;'>{{$info->unit}}</td>
                        <td valign='top' style='font-size:12px;'>{{$info->unit_price}}</td>
                        <td valign='top' style='font-size:12px;'>{{$info->total_price}}</td>

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
                        <td align='right' style='font-size:12px;'>{{$subtotal}}
                        <td>
                    </tr>
                    <tr>
                        <td align='right' style='font-size:12px;'>TAX(6.25%)</td>
                        <td align='right' style='font-size:12px;'>$68.44</td>
                    </tr>
                    <tr>

                        <td align='right' style='font-size:12px;'><b>Total</b></td>
                        <td align='right' style='font-size:12px;'><b>$1,163.44</b></td>
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
            <td width='33%' style='border-top:double medium #CCCCCC;font-size:12px;' valign='top'><b>{{$company_details->app_name}}</b><br />


            </td>
            <td width='33%' style='border-top:double medium #CCCCCC; font-size:12px;' align='center' valign='top'>
                {{$company_details->address}}<br />
                [Company address line 2] <br />
                Phone: {{$company_details->phone_1}}<br />
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