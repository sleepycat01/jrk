<?php

namespace App\Models;

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

    protected $hidden = [
        'password',
        'remember_token',
    ];

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


}
