<?php

namespace App\Models\Backend;

use App\Models\Frontend\Quotation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationApplication extends Model
{

    use HasFactory;
    protected $fillable = ['quotation_request_id', 'item_id', 'unit_price'];
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
    public function requestId()
    {
        return $this->belongsTo(Quotation::class, 'quotation_request_id');
    }
}
