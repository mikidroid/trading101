<?php

namespace App\Models;

use App\Models\MyTransaction;
use App\Models\Investment;
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

class User extends Authenticatable implements /*MustVerifyEmail,*/ Wallet, WalletFloat
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
    
    public function transaction(){
       return $this->hasMany(MyTransaction::class);
    }
    
    public function investment(){
       return $this->hasMany(Investment::class);
    }
}
