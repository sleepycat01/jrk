<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mold extends Model
{
    use HasFactory;

    const MOLD_ACTIVE = 'active';
    const MOLD_INACTIVE= 'inactive';

    protected $fillable = [
        'title',
        'code',
    ];
}
