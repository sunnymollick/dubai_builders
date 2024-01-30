<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body {
            width: 100%;
            height: max-content;
            font-family: Tahoma;
            font-size: 18px;
            color: #333333;
            background-color: #FFFFFF;
        }

        table {
            font-size: 15px;
            border-collapse: collapse;
            margin: auto;
        }

        .details {
            width: 100%;
            font-size: 17px;
            border-collapse: collapse;
            margin: auto;
        }

        .bill-info {
            width: 100%;
            font-size: 15px;
            border-collapse: collapse;
            margin: auto;
        }

        .details td {
            border: 1px solid #ccc;
        }

        img {
            margin-bottom: 10px;
        }

        .bill-to {
            text-align: left;
            float: left;
            width: 35%;
            font-size: 15px;
        }

        .invoice-details {
            text-align: right;
            float: right;
            width: 30%;
            font-size: 15px;
        }

        td.credit-note {
            color: red;
            padding: 30px 0px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        td.description {
            width: 35%;
            font-size: 15px;
            border: 1px solid #ccc;
            background-color: #f2f2f2;
        }

        td.amount {
            text-align: right;
        }

        td.footer {
            font-size: 15px;
            border-top: double medium #CCCCCC;
        }
    </style>
</head>

<body>
    <table width="100%" cellspacing="0" cellpadding="2">
        <tr>
            <td width="33%"><img height="100px" width="140" src="{{ public_path($company_details->app_logo) }}" /><br /><br></td>
        </tr>
    </table>
    <table class="bill-info">
        <tr>
            <td align="left" style="float: left; text-align:left">
                <table width='100%' align="left" cellspacing='0' cellpadding='5'>
                    <tr style="background-color: yellowgreen;font-size:18px; font-weight:bold; ">
                        <td>Bill To:</td>

                    </tr>
                    <tr>
                        <td valign='top' style='font-size:18px; color:red; background-color:blanchedalmond'> <strong>{{$client_details->company_name}}</strong><br />
                            <p style="color:black; font-size:14px">{{$client_details->address}} <br>
                                [Client's company address line 2] <br /></p>


                        </td>
                    </tr>
                </table>
            </td>
            <td width="30%">

            </td>
            <td>
                <table width='80%' align="right" cellspacing='0' cellpadding='5'>
                    <tr>
                        <td valign='top' width='30%' style='font-size:14px; background-color:yellowgreen'><b>Invoice Date: </b>


                        </td>
                        <td valign='top' width='30%' style='font-size:13px;background-color:blanchedalmond'>{{$quotation_details->created_at}}

                        </td>
                    </tr>
                    <tr>
                        <td valign='top' width='30%' style='font-size:14px; background-color:yellowgreen'>
                            <b>Due Date:</b>


                        </td>
                        <td valign='top' width='30%' style='font-size:13px;background-color:blanchedalmond'>
                            03/18/2021


                        </td>
                    </tr>
                </table>
            </td>


        </tr>
    </table>
<br>
    <table>
        <tr>
            <td class="credit-note"><b>Quotation ID # <span style="color:aqua;"> {{$quotation_details->quotation_code}}</span> </b></td>
        </tr>
    </table>
<br>
    <table class="details" cellpadding='5'>
        <tr>
            <td width='35%' bordercolor='#ccc' bgcolor='yellowgreen' style='font-size:15px; border-collapse:collapse; border-right: 1px solid gray'><strong>Description
                </strong></td>
            <td bordercolor='#ccc' bgcolor='yellowgreen' style='font-size:15px; border-collapse:collapse; border-right: 1px solid gray'><strong>Qty</strong></td>
            <td bordercolor='#ccc' bgcolor='yellowgreen' style='font-size:15px; border-collapse:collapse; border-right: 1px solid gray'><strong>Unit</strong>
            </td>
            <td bordercolor='#ccc' bgcolor='yellowgreen' style='font-size:15px; border-collapse:collapse; border-right: 1px solid gray'><strong>Unit Price</strong>
            </td>
            <td bordercolor='#ccc' bgcolor='yellowgreen' style='font-size:15px;'><strong>Subtotal</strong></td>

        </tr>

        <tr style="display:none;">
            <td colspan="*">
                @php $currentCategory = null; @endphp
                @foreach($quotation_details->details as $info)
                @if($info->category_id !== $currentCategory)
        <tr>
            <td colspan="5" style="background-color:blanchedalmond;font-size:14px;">
                {{ $info->item->workcategory->title }}
            </td>
        </tr>
        @php $currentCategory = $info->category_id; @endphp
        @endif
        <tr>
            <td valign='top' style='font-size:14px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info->item->item_work }}</td>
            <td valign='top' style='font-size:14px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info->quantity }}</td>
            <td valign='top' style='font-size:14px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info->unit }}</td>
            <td valign='top' style='font-size:14px; border-collapse:collapse; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info->unit_price }}</td>
            <td valign='top' style='font-size:14px; border-collapse:collapse;  border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $info->total_price }}</td>
        </tr>
        @endforeach
    </table>
    <table style="height: 100px;" width="700px" cellspacing="0" cellpadding="2" border="0">
        <tr>
            <td align="left" style="font-size:14px; width:60%"><strong></strong>
            </td>
            <td align="right" style="width:40%">
                <table width='100%' cellspacing='0' cellpadding='2' border='0'>
                    <tr>
                        <td align='right' style='font-size:14px;'>Subtotal</td>
                        <td width="10%"></td>
                        <td align='right' style='font-size:14px; color:tomato'>{{$subtotal}}
                        </td>
                    </tr>
                    <tr>
                        <td align='right' style='font-size:14px;'>TAX(6.25%)</td>
                        <td width="10%"></td>
                        <td align='right' style='font-size:14px; color:tomato'>$68.44</td>
                    </tr>
                    <tr>
                        <td align='right' style='font-size:14px;'><b>Total</b></td>
                        <td width="10%"></td>
                        <td align='right' style='font-size:14px; color:tomato'><b>$1,163.44</b></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table width='100%' cellspacing='0' cellpadding='2'>
        <tr>
            <td width='33%' style='border-top:double medium #CCCCCC;font-size:18px; color:red' valign='top'><b>{{$company_details->app_name}}</b><br />


            </td>
            <td width='33%' style='border-top:double medium #CCCCCC; font-size:15px;' align='center' valign='top'>
                <strong>{{$company_details->address}}<br />
                    [Company address line 2] <br />
                    Phone: {{$company_details->phone_1}}<br /></strong>

            </td>

            <td valign='top' width='34%' style='border-top:double medium #CCCCCC;font-size:14px;' align='right'>[payment
                details]<br />
            </td>
        </tr>
    </table>
    </td>
    </tr>
    </table>
</body>

</html>