<?php

namespace Database\Seeders;

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
        $this->call([
            UsersTable::class,

        ]);

        for ($i = 0; $i < 15; $i++) {
            $this->call(DiscountsTable::class);
        }
    }
}
