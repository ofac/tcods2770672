<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_id'
    ];

    // RelationShip
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function pet() {
        return $this->belongsTo('App\Models\Pet');
    }
}
