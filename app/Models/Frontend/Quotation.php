<?php

namespace App\Models\Frontend;

use App\Models\Backend\QuotationApplication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;
    public function quotationApplications()
    {
        return $this->hasMany(QuotationApplication::class, 'quotation_request_id');
    }
}
