<?php

namespace Database\Factories;

use App\Models\TournamentTeam;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentTeamFactory extends Factory
{
    protected $model = TournamentTeam::class;

    public function definition(): array
    {
        return [
            'name'       => $this->faker->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
