<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function categories()
    {
        return $this->belongsTo(InventoryCategory::class, 'category_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(InventSupplier::class, 'supplier_id', 'id');
    }


}
