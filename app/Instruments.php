<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruments extends Model
{
    protected $table = 'instruments';
    
    public function fetchAll() {
        return Instruments::all();
    }
}
