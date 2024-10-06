<div style='font-family:Tahoma;font-size:12px;color: #333333;background-color:#FFFFFF;'>
    <table align='center' border='0' cellpadding='0' cellspacing='0' style='height:50px; width:100%;font-size:12px;'>
        <tr>
            <td valign='top'>
                <table width='100%' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td valign='bottom' width='50%' height='50'>
                            <div align='left'><img height="80px" width="120"
                                    src='{{ asset($company_details->app_logo) }}' />
                            </div><br />
                        </td>

                        <td width='50%'>&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="80%"></td>
                        <td width="20%"><b>TRN NO. {{ $company_details->trn_number }}</b></td>
                    </tr>
                    <tr></tr>
                </table>
                <!-- <div style="background-color: yellowgreen; width: 50%"><b>Bill To:</b></div><br /> -->

                <table width='100%' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td style="text-align: left">
                            <table width='75%' align="left" cellspacing='0' cellpadding='5'>
                                <tr style="background-color: yellowgreen;font-size:15px; font-weight:bold; ">
                                    <td>Invoice To:</td>

                                </tr>
                                <tr>
                                    <td valign='top'
                                        style='font-size:14px; color:red; background-color:blanchedalmond'>
                                        @if ($client_details->organization_name != null)
                                            <strong>{{ $client_details->organization_name }}</strong><br />
                                        @endif
                                        @if ($client_details->address != null)
                                            <p style="color:black; font-size:12px">{{ $client_details->address }}
                                        @endif


                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="text-align: right">

                            <table width='100%' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <table width='75%' align="right" cellspacing='0' cellpadding='5'>
                                        <tr style="background-color: yellowgreen;font-size:15px; font-weight:bold; ">
                                            <td style="text-align: left">Invoice For</td>

                                        </tr>
                                        <tr>
                                            <td valign='top'
                                                style='text-align:left;font-size:14px; color:red; background-color:blanchedalmond'>
                                                @if ($title != null)
                                                    <strong>{{ $title }}</strong><br />
                                                @endif
                                                {{-- <p style="color:black; font-size:12px">{{ $client_details->address }} --}}
                                                @if ($invoiceDate != null)
                                                    <p style="color:black; font-size:12px;padding-bottom: 0">
                                                        {{ date('d-m-Y', strtotime($invoiceDate)) }}
                                                @endif
                                                @if ($trn != null)
                                                    <p style="color:black; padding-top:0;bank_detailsfont-size:12px">
                                                        {{ $trn }}
                                                @endif

                                            </td>
                                        </tr>
                                    </table>
                                </tr>
                            </table>

                        </td>

                    </tr>
                </table>

                {{--
                <table width='100%' height='50'>
                    <tr>
                        <td style='font-size:12px;text-align:justify;'></td>
                    </tr>
                </table> --}}


                <table width='100%' height='100' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td>
                            <div align='center' style='font-size: 17px;font-weight: bold; color:red'>Invoice ID #
                            </div>
                        </td>
                    </tr>
                </table>
                <table width='100%' cellspacing='0' cellpadding='10' border='1' bordercolor='#CCCCCC'>
                    <h3></h3>
                    <tr>

                        <td width='35%' bordercolor='#ccc' bgcolor='yellowgreen'
                            style='font-size:14px; border-collapse:collapse; border-right: 1px solid gray'>
                            <strong>Description
                            </strong>
                        </td>
                        <td bordercolor='#ccc' bgcolor='yellowgreen'
                            style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray'>
                            <strong>Qty</strong>
                        </td>
                        <td bordercolor='#ccc' bgcolor='yellowgreen'
                            style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray'>
                            <strong>Unit</strong>
                        </td>
                        <td bordercolor='#ccc' bgcolor='yellowgreen'
                            style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray'><strong>Unit
                                Price ({{ $currency }})</strong>
                        </td>
                        <td bordercolor='#ccc' bgcolor='yellowgreen' style='font-size:12px;'><strong>Subtotal ({{ $currency }})</strong>
                        </td>

                    </tr>
                    @foreach ($dataArray as $category => $items)
                        <tr>
                            <td colspan="5"
                                style="background-color:blanchedalmond; font-size:14px; border-bottom: 1px solid gray;">
                                <strong>{{ $category }}</strong>
                            </td>
                        </tr>
                        @foreach ($items as $index => $info)
                            <tr>
                                <td valign='top'
                                    style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>
                                    {{ $info['item_name'] }}</td>
                                <td valign='top'
                                    style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>
                                    {{ $info['quantity'] }}</td>
                                <td valign='top'
                                    style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>
                                    {{ $info['unit'] }}</td>
                                <td valign='top'
                                    style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray;text-align:center;'>
                                    {{ number_format($info['unitPrice'], 2) }}</td>
                                <td valign='top'
                                    style='font-size:12px; border-collapse:collapse;  border-bottom: 1px solid gray; border-top: 1px solid gray;text-align:right;'>
                                    {{ number_format($info['totalPrice'], 2) }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top'
                            style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>
                            Paid Amount</td>
                        <td valign='top'
                            style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray;text-align:right;'>
                            {{ number_format($paid_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top'
                            style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>
                            Due</td>
                        <td valign='top'
                            style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray;text-align:right;'>
                            {{ number_format($due, 2) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top'
                            style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>
                            Grand Total</td>
                        <td valign='top'
                            style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray;text-align:right;'>
                            {{ $currency }}     {{ number_format($grandTotal, 2) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td valign='top'
                            style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-left: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>
                            Payment Method</td>
                        <td valign='top'
                            style='color:red; font-weight:bold;font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray;text-align:right;'>
                            {{ $payment_method }}</td>
                    </tr>

            </td>
        </tr>
    </table>
    <table width='100%' height='50'>
        <tr>
            <td style='font-size:12px;text-align:justify;'></td>
        </tr>
    </table>
    @if ($bank_details != null)
        <br>
        <br>
        <table width='100%' cellspacing='0' cellpadding='10'  bordercolor='#CCCCCC'>
            <tr>

                <td width='35%' bordercolor='#ccc' bgcolor='yellowgreen'
                    style='font-size:14px; border-collapse:collapse; border-right: 1px solid gray'><strong>BANK DETAILS
                    </strong>
                </td>

            </tr>
            <tr>
                <td valign='top'
                    style='font-size:12px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray ; border-left: 1px solid gray;'>
                    {{ $bank_details }}</td>
            </tr>
        </table>
    @endif

    <table width='100%' height='50'>
        <tr>
            <td style='font-size:12px;text-align:justify;'></td>
        </tr>
    </table>
    <table width='100%' cellspacing='0' cellpadding='2'>
        <tr>
            <td width='33%' style='border-top:double medium #CCCCCC;font-size:15px; color:red' valign='top'>
                <b>{{ $company_details->app_name }}</b><br />


            </td>
            <td width='33%' style='border-top:double medium #CCCCCC; font-size:12px;' align='center'
                valign='top'>
                <strong>{{ $company_details->address }}<br />
                    Phone: {{ $company_details->phone_1 }}<br /></strong>

            </td>

            <td valign='top' width='34%' style='border-top:double medium #CCCCCC;font-size:12px;'
                align='right'><br />
            </td>
        </tr>
    </table>
    </td>
    </tr>

    </table>
</div>
