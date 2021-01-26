<?php

namespace App\Models\Cecy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ignug\State;

class Locations extends Model
{
    use HasFactory;

    protected $connection = 'pgsql-cecy';
    protected $fillable = [
        'name'
    ];
    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }
   
}
