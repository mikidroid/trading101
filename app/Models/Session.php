<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'            => 'string',
        'last_activity' => 'datetime',
    ];
    
    protected $dateFormat = 'U';

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('last_activity');
    }


    protected function serializeDate(\DateTimeInterface $date)
{
    return $date->format('Y-m-d');
}
}
