<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ng extends Model
{
    use HasFactory;

    const NG_ACTIVE = 'active';
    const NG_INACTIVE= 'inactive';

    protected $fillable = [
        'title',
        'code',
        'status'
    ];
}
