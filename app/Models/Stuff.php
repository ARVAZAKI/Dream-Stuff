<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    use HasFactory;
    protected $table = 'stuffs';
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
