<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function workcategory()
    {
        return $this->belongsTo(WorkCategory::class, 'work_category_id');
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id');
    }
    public function quotationDetails()
    {
        return $this->hasMany(QuotationDetails::class, 'item_id');
    }
}
