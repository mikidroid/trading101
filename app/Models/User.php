<?php

namespace App\Models;

use App\Models\MyTransaction;
use App\Models\Investment;
use App\Models\Lottery;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
/*use Bavix\Wallet\Traits\HasWallet;*/
use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Traits\HasWalletFloat;
use Bavix\Wallet\Interfaces\WalletFloat;
//using for multiple wallets
use Bavix\Wallet\Traits\HasWallets;

class User extends Authenticatable implements MustVerifyEmail, Wallet, WalletFloat
{
    use HasApiTokens, HasFactory, Notifiable /*HasWallet*/,HasWalletFloat, HasWallets;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'is_admin',
        'dob',
        'country',
        'gender',
        'profile_status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function myTransaction(){
       return $this->hasMany(MyTransaction::class);
    }
    
    public function investment(){
       return $this->hasMany(Investment::class);
    }
    
    public function lottery(){
     return $this->hasMany(Lottery::class);
    }
}
