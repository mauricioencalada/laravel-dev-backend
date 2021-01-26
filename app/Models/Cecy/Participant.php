<?php

namespace App\Models\Cecy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Cecy\Instructor;
use App\Models\Authentication\User;
use App\Models\Ignug\State;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Participant extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $connection = 'pgsql-cecy';
    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }

    public function participants()
    {
        return $this->belongsTo(Catalogue::class,'person_type_id');
    }
}
