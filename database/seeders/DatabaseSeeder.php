<?php

namespace Database\Seeders;

use App\Models\Dummy;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $default_user = new User([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => Hash::make("12345678"),
        ]);

        $default_user->save();

        Dummy::factory(20)->create();
    }
}
