<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // シーダーの呼び出し
        $this->call([
            ServicesTableSeeder::class,    
            CompaniesTableSeeder::class,
            IndustriesTableSeeder::class,
            CommentsTableSeeder::class,
            ConflictsTableSeeder::class,
            TermsTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
