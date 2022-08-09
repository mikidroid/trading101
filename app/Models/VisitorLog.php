<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'details',
        'visitors',
        'date',
     ];
     
    protected $casts = [
        'details' => 'array',
        'date' => 'datetime:Y-m-d',
    ];
    
    //protected $dateFormat = 'U';

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('date');
    }


}
