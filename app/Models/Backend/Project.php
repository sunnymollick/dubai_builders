<?php

namespace App\Models\Backend;

use App\Models\Backend\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
