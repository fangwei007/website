<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class Instruments extends Model
{
    protected $table = 'instruments';
    
    public function fetchAll() {
        return Instruments::where('status', 'A')->paginate(8);
    }
}
