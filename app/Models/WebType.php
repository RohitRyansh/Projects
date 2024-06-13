<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebType extends Model
{
    use HasFactory;

    CONST ALL_TYPES = [
       1 => 'WEB',
       2 =>  'MOBILE',
       3 => 'AUTO',
       4 => 'EMBEDDED'
    ];

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}
