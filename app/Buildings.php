<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buildings extends Model
{   
    public $timestamps = false;
    
    protected $fillable = [
        'name', 'budjet', 'start_date', 'end_date', 'users_id'
    ];
}
