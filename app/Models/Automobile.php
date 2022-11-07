<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automobile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'year',
        'identifier',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
