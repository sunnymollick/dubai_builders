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
            margin: auto;
        }

        .top-table {
            height: 80px;
            padding-right: 70px;
        }

        .bill-info {
            width: 300px;
            margin-top: 80px;
            height: 50px;
            font-size: 13px;
        }

        .company-info {
            width: 300px;
            font-size: 15px;
        }

        .details {
            border: 1px solid #ccc;
        }

        img {
            margin-bottom: 10px;
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
    <table class="top-table">
        <tr>
            <td align="left">
                <table class="company-info" cellspacing="0" cellpadding="2">
                    <tr>
                        <td width="33%"><img height="100px" width="140" src="{{ public_path($company_details->app_logo) }}" /></td>
                    </tr>
                    <tr>
                        <td width='33%' style='font-size:18px; color:red' valign='top'><b>{{$company_details->app_name}}</b><br />


                        </td>
                    </tr>
                    <tr>
                        <td width='100%' style='font-size:15px;' valign='top'>
                            {{$company_details->address}}

                        </td>
                    </tr>
                    <tr>
                        <td width='100%' style='font-size:15px;' valign='top'>
                            {{$company_details->email}}, {{$company_details->phone_1}}

                        </td>
                    </tr>
                </table>
            </td>
            <td width="150px"></td>
            <td align="right">
                <table class="bill-info">
                    <tr>
                        <td>
                            <table cellspacing='0' cellpadding='5'>
                                <tr>
                                    <td style='background-color:yellowgreen'>
                                        <b>Invoice To</b>
                                    </td>
                                    <td style='background-color:blanchedalmond; color:red'>
                                        {{$client_details->organization_name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td valign='top' style=' background-color:yellowgreen'>
                                        <b>Customer ID</b>
                                    </td>
                                    <td valign='top' style='background-color:blanchedalmond; color:red'>
                                        {{$client_details->client_code}}
                                    </td>
                                </tr>
                                <tr>
                                    <td valign='top' style='background-color:yellowgreen'>
                                        <b>Invoice ID</b>
                                    </td>
                                    <td valign='top' style='background-color:blanchedalmond; color:red'>
                                        {{$inv_data->invoice_code}}
                                    </td>
                                </tr>
                                <tr>
                                    <td valign='top' style='background-color:yellowgreen'><b>Quotation Date: </b>
                                    </td>
                                    <td valign='top' style='background-color:blanchedalmond'>{{$inv_data->created_at->format('d/m/Y')}}

                                    </td>
                                </tr>

                            </table>
                        </td>


                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <br>
    <br>
    <table class="details" cellpadding='5'>
        <tr>
            <td width='35%' bordercolor='#ccc' bgcolor='yellowgreen' style='font-size:15px; border:1px solid #001a00;'><strong>Description
                </strong></td>
            <td bgcolor='yellowgreen' style='font-size:15px; border:1px solid #001a00;'><strong>Qty</strong></td>
            <td bgcolor='yellowgreen' style='font-size:15px; border:1px solid #001a00;'><strong>Unit</strong>
            </td>
            <td bgcolor='yellowgreen' style='font-size:15px; border:1px solid #001a00;'><strong>Unit Price</strong>
            </td>
            <td bgcolor='yellowgreen' style='font-size:15px;border:1px solid #001a00; text-align:right'><strong>Subtotal</strong></td>

        </tr>

        <tr style="display:none;">
            <td colspan="*">
                @foreach ($groupedDetails as $category => $categoryDetails)
                @php
                $categoryTitle = $categoryDetails->first()->category->title;
                @endphp
        <tr>
            <td colspan="5" style="background-color:blanchedalmond;font-size:14px; border: 1px solid #001a00">
                {{ $categoryTitle }}
            </td>
        </tr>
        @foreach($categoryDetails as $info)
        <tr>
            <td valign='top' style='font-size:14px; border: 1px solid #001a00'>{{ $info->item->item_work }}</td>
            <td valign='top' style='font-size:14px; border: 1px solid #001a00'>{{ $info->quantity }}</td>
            <td valign='top' style='font-size:14px;border: 1px solid #001a00'>{{ $info->unit }}</td>
            <td valign='top' style='font-size:14px; border: 1px solid #001a00'>{{ $info->unit_price }}</td>
            <td valign='top' style='font-size:14px; border: 1px solid #001a00; text-align:right; padding-right:5px'>{{ $info->total_price }}</td>
        </tr>
        @endforeach
        @endforeach
        @if($inv_data->discount_amount && $inv_data->tax)
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style='font-size:14px;;'>Sub Total</td>

            <td style='font-size:14px;; color:tomato; text-align:right; padding-right:5px'>{{$subTotal}}
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style='font-size:14px;;'>DISCOUNT(amount)</td>

            <td style='font-size:14px;; color:tomato; border: 1px solid #001a00; text-align:right; padding-right:5px '>{{$inv_data->discount_amount}}</td>
        </tr>
        @php
        $afterDiscount = $subTotal - $inv_data->discount_amount;
        $tax_amount = ($inv_data->tax*$afterDiscount)/100;
        @endphp
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style='font-size:14px;;'>Total</td>

            <td style='font-size:14px;; color:tomato; border: 1px solid #001a00 ; text-align:right; padding-right:5px'>{{$afterDiscount}}
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style='font-size:14px;;'>TAX({{$inv_data->tax}}%)</td>

            <td style='font-size:14px;; color:tomato; border: 1px solid #001a00 ; text-align:right; padding-right:5px'>{{$tax_amount}}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style='font-size:14px;;'><b>Grand Total</b></td>

            <td style='font-size:14px;; color:tomato; border: 1px solid #001a00 ; text-align:right; padding-right:5px'><b>{{$inv_data->grand_total}}</b></td>
        </tr>
        @elseif($inv_data->discount_amount)
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style='font-size:14px;'>Sub Total</td>

            <td style='font-size:14px; color:tomato; text-align:right; padding-right:5px'>{{$subTotal}}
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style='font-size:14px;'>DISCOUNT(amount)</td>

            <td style='font-size:14px; color:tomato; border: 1px solid #001a00 ; text-align:right; padding-right:5px'>{{$inv_data->discount_amount}}</td>
        </tr>
        @php
        $afterDiscount = $subTotal - $inv_data->discount_amount;
        @endphp
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style='font-size:14px;'>Grand Total</td>

            <td style='font-size:14px; color:tomato; border: 1px solid #001a00 ; text-align:right; padding-right:5px'>{{$inv_data->grand_total}}
            </td>
        </tr>
        @elseif($inv_data->tax)
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style='font-size:14px;'>Subtotal</td>

            <td style='font-size:14px; color:tomato; text-align:right; padding-right:5px'>{{$subTotal}}
            </td>
        </tr>
        @php
        $tax_amount = ($inv_data->tax*$subTotal)/100;
        @endphp
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style='font-size:14px;'>TAX({{$inv_data->tax}}%)</td>

            <td style='font-size:14px; color:tomato; border: 1px solid #001a00; text-align:right; padding-right:5px '>{{$tax_amount}}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style='font-size:14px;'><b>Grand Total</b></td>

            <td style='font-size:14px; color:tomato; border: 1px solid #001a00; text-align:right; padding-right:5px '><b>{{$inv_data->grand_total}}</b></td>
        </tr>
        else
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td style='font-size:14px;'>Grand Total</td>

            <td style='font-size:14px; color:tomato; text-align:right; padding-right:5px'>{{$inv_data->grand_total}}
            </td>
        </tr>
        @endif

    </table>

    @if($inv_data->terms_conditions)
    <br>
    <br>
    <table width='100%' cellspacing='0' cellpadding='10' border='1' bordercolor='#CCCCCC'>
        <tr>

            <td width='35%' bordercolor='#ccc' bgcolor='yellowgreen' style='font-size:14px; border-right: 1px solid gray'><strong>TERMS & CONDITIONS
                </strong>
            </td>

        </tr>
        <tr>
            <td valign='top' style='font-size:12px; border-right: 1px solid gray; border-bottom: 1px solid gray; border-top: 1px solid gray'>{{ $inv_data->terms_conditions }}</td>
        </tr>
    </table>
    @endif

    <!-- <table width='100%'>
        <tr>
            <td style='font-size:12px;text-align:justify; height:50px;'></td>
        </tr>
    </table>
    <table width='100%' cellspacing='0' cellpadding='2'>
        <tr>
            <td width='33%' style='border-top:double medium #CCCCCC;font-size:18px; color:red' valign='top'><b>{{$company_details->app_name}}</b><br />


            </td>
            <td width='33%' style='border-top:double medium #CCCCCC; font-size:15px;' align='center' valign='top'>
                <strong>{{$company_details->address}}<br />
                    @if($company_details->address_secondary)
                    Second Address: {{$company_details->address_secondary}} <br />
                    @endif
                    Phone: {{$company_details->phone_1}}<br /></strong>

            </td>

            <td valign='top' width='34%' style='border-top:double medium #CCCCCC;font-size:14px;' align='right'><br />
            </td>
        </tr>
    </table> -->
    </td>
    </tr>
    </table>
</body>

</html>