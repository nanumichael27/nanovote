<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * Offices
     * one to many
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offices()
    {
        return $this->hasMany(Office::class);
    }

    /**
     * Voters
     * one to many
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function voters()
    {
        return $this->hasMany(User::class, 'election_id');
    }

    /**
     * Votes
     * many to many
     * 
     */
    public function getVotesAttribute()
    { $votes = 0;
        foreach ($this->offices as $office) {
           foreach ($office->candidates as $candidate) {
               $votes += $candidate->votes->count();
           } 
        }
        return $votes;
    }
}
