<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostInventory extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function product()
    {
         return $this->belongsTo(Inventory::class, 'product_id','id');
    }
}
