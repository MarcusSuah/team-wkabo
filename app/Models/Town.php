<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Town extends Model
{
    protected $fillable = ['name', 'clan_id', 'district_id'];

    public function clan(): BelongsTo
    {
        return $this->belongsTo(Clan::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }
}
