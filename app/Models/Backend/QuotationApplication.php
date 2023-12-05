<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationApplication extends Model
{

    use HasFactory;
protected $fillable = ['quotation_request_id','item','unit_price'];
}
