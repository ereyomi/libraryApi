<?php


use App\User;
use App\Book;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Book::truncate();

        $userQuantity = 50;

        factory(User::class, 50)->create();
        factory(Book::class, 50)->create();
    }
}
