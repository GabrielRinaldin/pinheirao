<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critics extends Model
{
    use HasFactory;

    protected $table = 'critics';    

    protected  $cast = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected  $fillable = [
        'user_id',
        'critic',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
