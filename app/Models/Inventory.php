<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    const INVENTORY_ACTIVE = 'active';
    const INVENTORY_INACTIVE= 'inactive';

    protected $fillable = [
        'title',
        'code',
        'stock',
        'status'
    ];
}
