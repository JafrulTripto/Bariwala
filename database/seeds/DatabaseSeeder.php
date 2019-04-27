<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        $this->call(user_table_seeder::class);
        User::create([
            'user_name'=>'Tripto',
            'email'=>'tripto_ewu@outlook.com',
            'password'=>Hash::make('1234'),
            'is_admin'=>1
        ]);
    }
}
