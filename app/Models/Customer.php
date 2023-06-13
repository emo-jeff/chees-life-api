<?php

namespace App\Models;

use App\Models\Base\Customer as BaseCustomer;
use App\Traits\Searchable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Customer extends BaseCustomer implements MustVerifyEmail
{
    use HasApiTokens, Searchable, Notifiable;

    public array $searchable = [
        'name', 'gender', 'email', 'address', 'tel', 'hkid', 'birthday'
    ];
    protected $hidden = [
        'password'
    ];
    protected $fillable = [
        'name',
        'gender',
        'birthday',
        'hkid',
        'tel',
        'email',
        'password',
        'address',
        'email_verified_at',
        'token'
    ];

    public function setPasswordAttribute(string $password): void
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function customer_histories()
    {
        return $this->hasMany(CustomerHistory::class)->orderByDesc('created_at');
    }
}
