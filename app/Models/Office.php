<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];


    /**
     * Election
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    /**
     * Candidates
     * one to many
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    /**
     * Votes attribute
     * 
     */
    public function getVotesAttribute()
    {
        $votes = 0;
        foreach ($this->candidates as $candidate) {
            $votes += $candidate->votes->count();
        }
        return $votes;
    }
}
