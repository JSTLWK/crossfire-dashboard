<?php

namespace Database\Seeders;

use App\Models\Step;
use Illuminate\Database\Seeder;

class StepSeeder extends Seeder
{
    public function run(): void
    {
        Step::updateOrCreate([
            'id' => 1,
        ], [
            'name'             => 'Discord username',
            'description'      => 'In order for the preparations we need your discord username.',
            'default_content'  => json_encode([]),
            'previous_step_id' => null,
            'next_step_id'     => null,
        ]);

        Step::updateOrCreate([
            'id' => 2,
        ], [
            'name'             => 'Twitch URL',
            'description'      =>
                'In order to have good streaming quality we ask you to stream on twitch.
            Please fill in your twitch URL.',
            'default_content'  => json_encode([]),
            'previous_step_id' => null,
            'next_step_id'     => null,
        ]);

        Step::updateOrCreate([
            'id' => 3,
        ], [
            'name'             => 'Escape from tarkov name',
            'description'      => 'In order on to have the tournament running as smooth as possible
            we need your name that shows in your launcher. ',
            'default_content'  => json_encode([]),
            'previous_step_id' => null,
            'next_step_id'     => null,
        ])->ignoreIndex('');
    }
}
