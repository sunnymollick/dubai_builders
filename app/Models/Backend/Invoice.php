<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function invoiceDetails()
    {
        return $this->hasMany(InvoiceDetails::class, 'invoice_id');
    }
}
