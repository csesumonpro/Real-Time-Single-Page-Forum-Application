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
        // $this->call(UsersTableSeeder::class);
        factory(\App\User::class,5)->create();
        factory(\App\Model\Category::class,5)->create();
        factory(\App\Model\Question::class,10)->create();
        factory(\App\Model\Reply::class,50)->create()->each(function ($replay){
            $replay->likes()->save( factory(\App\Model\Like::class)->make());
        });
    }
}
