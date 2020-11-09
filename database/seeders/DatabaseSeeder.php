<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\User;
use App\Models\Prisoner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
        // User::factory(10)->create();
        Prisoner::factory(50)->create();

        User::create([
            'name' => 'Sherab Gyatso',
            'email' => 'sherabguerdat@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('abcd1234'),
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'name' => 'Tenzin Chemi',
            'email' => 'imechemi@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('abcd1234'),
            'remember_token' => Str::random(10)
        ]);

        $this->call(CountriesTableSeeder::class);
    }
}
