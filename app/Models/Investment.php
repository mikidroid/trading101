<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
 
    use HasFactory;
    protected $fillable = [
        'name',
        'amount',
        'user_id',
        'email',
        'start_date',
        'end_date',
        'count',
        'duration',
        'status'
    ];
    
   public function user(){
    return $this->belongsTo(User::class);
  }
}
