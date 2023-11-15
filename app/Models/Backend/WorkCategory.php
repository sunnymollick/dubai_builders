<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkCategory extends Model
{
    use HasFactory;
    public function itemwork()
    {
        return $this->hasMany(Item::class,'work_category_id');
    }
}
