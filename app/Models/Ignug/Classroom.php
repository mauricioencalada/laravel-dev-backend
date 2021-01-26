<?php

namespace App\Models\Ignug;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Ignug\Catalogue;
use App\Models\Ignug\Image;


class Classroom extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $connection = 'pgsql-ignug';
    use HasFactory;

    const TYPE_AVATARS = 'AVATARS';

    protected $fillable = [
        'code',
        'name',
        'capacity',
        'icon',
    ];

    
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function type()
    {
        return $this->belongsTo(Catalogue::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
