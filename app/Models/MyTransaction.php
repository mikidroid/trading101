<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyTransaction extends Model
{
  use HasFactory;
    
  protected $fillable = [
        'name',
        'amount',
        'coin_value',
        'email',
        'coin',
        'coin_address',
        'ref',
        'user_id',
        'type',
        'status',
        'code'
    ];
    
  public function user(){
    return $this->belongsTo(User::class);
  }
    
}