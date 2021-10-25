<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Voting;
use Illuminate\Database\Seeder;

class VotingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $votacion = Voting::create([
            'id' => 1,
            'name' => 'votación 1',
            'description' => 'bla bnla',
            'begin_at' => '2021-24-10',
            'end_at' => '2021-25-10',
        ]);

        $op1 = Option::create([
            'voting_id' => 1,
            'description' => 'op 1',
        ]);

        $op1 = Option::create([
            'voting_id' => 1,
            'description' => 'op 2',
        ]);

        $op1 = Option::create([
            'voting_id' => 1,
            'description' => 'op 3',
        ]);
        //

        Voting::factory()->count(20)->create();
    }
}
