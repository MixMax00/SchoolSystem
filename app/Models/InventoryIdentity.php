<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryIdentity extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function products()
    {
        return $this->belongsTo(Inventory::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(InventoryCategory::class, 'category_Id', 'id');
    }


}
