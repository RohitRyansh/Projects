<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Lead extends Model
{
    use HasFactory;

    protected $guarded = [];

    CONST TYPES = [
        'WEB',
        'MOBILE',
        'AUTO',
        'EMBEDDED'
    ];

    CONST ACTIVE = 'Active';

    CONST INACTIVE = 'In Active';


    public function getLeadStatusAttribute()
    {
        return $this->status ? self::ACTIVE : self::INACTIVE;
    }

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? self::ACTIVE : self::INACTIVE,
        );
    }

    public function scopeStatus($query, $tab)
    {
        $query->when($tab ?? false, function ($query, $tab) {
            $tab = $tab == 1 ? true : false;
            $query->where('status', $tab);
        });
    }
}
