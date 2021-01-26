<?php

namespace App\Models\Cecy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Ignug\State;

use App\Models\Cecy\Authorities;

class Institution extends Model  implements Auditable
{

    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $connection = 'pgsql-cecy';
    protected $fillable = [
        'name',
        'logo',
        'slogan',
        'code',
        'ruc'        
    ];


 

    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }

    public function authorities()
    {
        return $this->belongsTo(Authorities::class,'authorities_id');
    }

}
