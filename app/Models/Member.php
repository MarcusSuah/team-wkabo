<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'mid_name',
        'last_name',
        'phone_primary',
        'phone_secondary',
        'email',
        'date_of_birth',
        'current_age',
        'age_2023',
        'age_2029',
        'gender',
        'district_id',
        'clan_id',
        'town_id',
        'current_residence',
        'voting_precinct_2029',
        'occupation',
        'whatsapp_primary',
        'whatsapp_secondary',
        'photo',
        'prior_political_involvement',
        'reasons_for_joining',
        'willing_to_volunteer',
        'willing_to_lead',
        'preferred_contributions',
        'declaration_accepted',
        'status'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'declaration_accepted' => 'boolean',
        'preferred_contributions' => 'array',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function clan()
    {
        return $this->belongsTo(Clan::class);
    }

    public function town()
    {
        return $this->belongsTo(Town::class);
    }

    /**
     * Get full name attribute
     */
    public function getFullNameAttribute()
    {
        return trim("{$this->first_name} {$this->mid_name} {$this->last_name}");
    }

    /**
     * Check if member is a first-time voter
     * 
     * Rule: 
     * - Age in October 2023 must be < 18
     * - Age in October 2029 must be >= 18
     * - Age in October 2029 must be < 23
     */
    public function getIsFirstTimeVoterAttribute()
    {
        return $this->age_2023 < 18 && $this->age_2029 >= 18 && $this->age_2029 < 23;
    }

    /**
     * Calculate age based on date of birth
     * 
     * @param string $dateOfBirth The date of birth
     * @param int|null $targetYear The target year (default: current year)
     * @return int The calculated age
     * 
     * If targetYear is provided, calculates age as of October 1st of that year.
     * Otherwise, calculates current age as of today.
     */
    public static function calculateAge($dateOfBirth, $targetYear = null)
    {
        $dob = Carbon::parse($dateOfBirth);
        
        if ($targetYear) {
            // Calculate age as of October 1st of the target year
            $target = Carbon::create($targetYear, 10, 1);
        } else {
            // Calculate current age
            $target = Carbon::now();
        }

        return (int) $dob->diffInYears($target);
    }
}