<?php

namespace App\Models\Cecy;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Ignug\State;


class SchoolPeriod extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $connection = 'pgsql-cecy';
    protected $fillable = [
        'code',
        'name',
        'start_date',
        'end_date',
        'ordinary_start_date',
        'ordinary_end_date',
        'extraordinary_start_date',
        'extraordinary_end_date',
        'especial_start_date',
        'especial_end_date'
    ];
    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }
    public function status(){
        return $this->belongsTo(Catalogue::class,'status_id');
    }
}
