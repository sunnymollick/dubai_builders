<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationDetails extends Model
{
    use HasFactory;
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
    public function category()
    {
        return $this->belongsTo(WorkCategory::class, 'category_id');
    }
    public function quotation()
    {
        return $this->belongsTo(QuotationApplication::class, 'quotation_id');
    }
}
