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
            height: 50px;
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
            padding: 30px 0px;
            text-align: center;
            font-size: 17px;
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
    <table>
        <tr>
            <td>
                <table>
                    <tr>
                        <td">
                            <div align="left"><img src="#" />
                            </div><br />
            </td>

            <td>&nbsp;</td>
        </tr>
    </table>
    Bill To: <br /><br />
    <table width="100%" cellspacing="0" cellpadding="2">
        <tr>
            <td class="bill-to" align="left">
                <strong>{{$client_details->company_name}}</strong><br />
                {{$client_details->address}}<br />
                [Client's company address line 2] <br />
            </td>
            <td></td>
            <td class="invoice-details" align="right">
                Invoice Date: 03/03/2021<br />
                Due Date: 03/18/2021 <br />
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="credit-note">Quotation ID # {{$quotation_details->first()->quotation_code}} </td>
        </tr>
    </table>
    <table class="details">
        <tr>
            <td class="description"><strong>Description </strong></td>
            <td><strong>Qty</strong></td>
            <td><strong>Unit</strong></td>
            <td><strong>Unit Price</strong></td>
            <td><strong>Subtotal</strong></td>
        </tr>
        <tr style="display:none;">
            <td colspan="*"></td>
        </tr>
                            @foreach($quotation_details as $info)
                    <tr>

                        <td>{{$info->item->item_work}}</td>
                        <td>{{$info->quantity}}</td>
                        <td>{{$info->unit}}</td>
                        <td>{{$info->unit_price}}</td>
                        <td>{{$info->total_price}}</td>

                    </tr>
                    @endforeach
        <!-- Additional rows if needed -->
    </table>
    <table width="700px" cellspacing="0" cellpadding="2" border="0">
        <tr>
            <td align="left" style="font-size:12px; width:465px"><strong></strong>
            </td>
            <td align="right" style="width:200px">
                <table cellspacing="0" cellpadding="2" border="0">
                    <tr>
                        <td align="left">Subtotal</td>
                        <td style="width:15px"></td>
                        <td align="right">{{$subtotal}}
                        <td>
                    </tr>
                    <tr>
                        <td align="left">TAX(6.25%)</td>
                        <td style="width:15px"></td>
                        <td align="right">$68.44</td>
                    </tr>
                    <tr>
                        <td align="left"><b>Total</b></td>
                        <td style="width:15px"></td>
                        <td align="right"><b>$1,163.44</b></td>
                    </tr>
                </table>
            </td>
            <td style="width:35px"></td>
        </tr>
    </table>

    <table width="100%" height="50">
        <tr>
            <td></td>
        </tr>
    </table>
    <table width="100%" cellspacing="0" cellpadding="2">
        <tr>
            <td class="footer" width="33%"><b>{{$company_details->app_name}}</b><br /></td>
            <td class="footer" width="33%" align="center">
                {{$company_details->address}}<br />
                [Company address line 2] <br />
                Phone: {{$company_details->phone_1}}<br />
            </td>
            <td class="footer" width="34%" align="right">
                [payment details]<br />
            </td>
        </tr>
    </table>
    </td>
    </tr>
    </table>
</body>

</html>