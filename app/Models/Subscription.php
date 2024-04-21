<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'dog_id',
        'recipe_id'
    ];

    public function dog() 
    {
        return $this->hasOne('App\Models\Dog');
    }
}
