<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
