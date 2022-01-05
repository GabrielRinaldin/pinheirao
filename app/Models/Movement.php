<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $dateFormat = [
        'date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
