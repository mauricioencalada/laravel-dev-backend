<?php

namespace App\Models\Cecy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Ignug\State;
use App\Models\Cecy\Institutions;
use App\Models\Authentication\User;
use App\Models\Authentication\Role;


class Authorities extends Model implements Auditable
{
    use HasFactory;

    use \OwenIt\Auditing\Auditable;

    protected $connection = 'pgsql-cecy';
    protected $fillable = [
        'user',
        'status',
        'position',
        'start_position',
        'end_position'
        
    ];

    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }

    public function position()
    {
        return $this->belongsTo(Catalogue::class,'position_id');
    }

     public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function status()
    {
        return $this->belongsTo(Catalogue::class,'status_id');
    }

}
