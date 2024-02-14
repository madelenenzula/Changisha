<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder 
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Madeline Admin',
            'email' => 'admin@google.com',
            'password' => 'password',
            'user_type' => 'admin' ,
            'active_status' => '1' 
        ]);

        User::factory(10)->create();
    }
}
