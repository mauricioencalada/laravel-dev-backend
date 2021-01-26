<?php

namespace App\Models\Cecy;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Ignug\State;

class Schedule extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $connection = 'pgsql-cecy';
    protected $fillable = [
      'start_time',
      'end_time',
     
    ];
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    public function day()
    {
        return $this->belongsTo(Catalogue::class, 'day_id');
    }
}
