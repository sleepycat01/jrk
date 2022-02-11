<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
//    use LogsActivity;
    use HasRoles;
    use HasFactory, Notifiable;

=======
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
>>>>>>> c1eb2b18879cec9baeddaf79fa43f0f999ed9a2a
    protected $hidden = [
        'password',
        'remember_token',
    ];

<<<<<<< HEAD
    const INFO_DB = 'ผู้ใช้ระบบ';

    const ROLE_SUPER_MAN = 'super man';
    const ROLE_SUPER_ADMIN = 'super admin';
    const ROLE_ADMIN = 'admin';


    const USER_ACTIVE = 'active';
    const USER_INACTIVE= 'inactive';

    protected static $logAttributes = ['*'];
    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function resetTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

    public function generateTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(10);
        $this->save();
    }


=======
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
>>>>>>> c1eb2b18879cec9baeddaf79fa43f0f999ed9a2a
}
