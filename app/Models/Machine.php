<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    const MACHINE_ACTIVE = 'active';
    const MACHINE_INACTIVE= 'inactive';


    protected $fillable = [
        'title',
        'code',
    ];
}
