<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Model implements Authenticatable
{
    use HasFactory, SoftDeletes, HasRoles, HasApiTokens;


    protected $guarded = [
        "id",
        "created_at",
        "updated_at",
    ];

    protected $casts = [
        'employment_date' => 'datetime'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }

    public function workdays()
    {
        return $this->hasMany(Workday::class);
    }

    public function permits()
    {
        return $this->hasMany(Permit::class);
    }

    public function getAuthIdentifierName()
    {
        return 'id'; // Kullanıcıyı tanımlayan sütunun adı (varsayılan olarak 'id').
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); // Kullanıcının benzersiz kimlik bilgisi (varsayılan olarak 'id').
    }

    public function getAuthPassword()
    {
        return $this->password; // Kullanıcının şifresi sütunu.
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Remember me token sütununun adı.
    }

    public function getRememberToken()
    {
        return $this->remember_token; // Remember me token değeri.
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value; // Remember me token değeri ayarlama.
    }


}
