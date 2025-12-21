<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Clan extends Model
{
    protected $fillable = ['name', 'district_id'];

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function towns(): HasMany
    {
        return $this->hasMany(Town::class);
    }

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }
}
