<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Lottery extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'status',
        'amount',
        'claimed',
        'user_id'
     ];
    
    public function user(){
     return $this->belongsTo(User::class);
    }
}
