<?php

use Illuminate\Database\Seeder;

class ConflictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factoryを使えるようにする
        factory(App\Conflict::class, 10)->create();
    }
}
