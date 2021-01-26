<?php

namespace App\Models\Cecy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Departments extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $connection = 'pgsql-cecy';
    protected $fillable = [
        'name',
        'address',
    ];
    public function charge()
    {
        return $this->belongsTo(Instructor::class);
    }
    public function schedule()
    {
        return $this->belongsTo(Catalogue::class,'schedule_id');
    }
    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }
}
