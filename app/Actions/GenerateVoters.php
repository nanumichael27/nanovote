<?php
namespace App\Actions;

use App\Models\Election;
use Illuminate\Support\Str;



class GenerateVoters
{
    public static function handle(Election $election, int $number_of_voters, string $prefix = 'SAC')
    {
        $codes = [];
        for ($i = 0; $i < $number_of_voters; $i++) {
            $codes[] = ['code' => Str::upper($prefix.rand(0,1000).Str::random(2))];
        }
        $election->voters()->createMany($codes);
    }
}