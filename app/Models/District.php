<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
class District extends Model
{
    protected $fillable = ['code', 'name', 'description'];

    public function clans(): HasMany
    {
        return $this->hasMany(Clan::class);
    }

    public function towns(): HasMany
    {
        return $this->hasMany(Town::class);
    }

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    protected static function booted()
    {
        static::creating(function ($district) {
            if (empty($district->code)) {
                $district->code = 'DST-' . strtoupper(Str::random(4));
            }
        });
    }
}
