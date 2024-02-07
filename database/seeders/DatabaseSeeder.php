<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->users();
        $this->rooms();
        $this->clients();
    }

    private function users()
    {
        $user = \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);

        $user = \App\Models\User::create([
            'name' => 'Revisor',
            'email' => 'Revisor@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);

        $user = \App\Models\User::create([
            'name' => 'User1',
            'email' => 'user1@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);
        $user = \App\Models\User::create([
            'name' => 'User2',
            'email' => 'user2@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);
    }

    public function rooms()
    {
        // Inserimento delle camere da 101 a 112
        for ($i = 101; $i <= 112; $i++) {
            DB::table('rooms')->insert([
                'room_number' => $i,
                'beds' => 2, // Numero di letti
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Inserimento delle camere da 201 a 211
        for ($i = 201; $i <= 211; $i++) {
            DB::table('rooms')->insert([
                'room_number' => $i,
                'beds' => 2, // Numero di letti
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Inserimento delle camere da 301 a 311
        for ($i = 301; $i <= 311; $i++) {
            DB::table('rooms')->insert([
                'room_number' => $i,
                'beds' => 2, // Numero di letti
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function clients()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            Client::create([
                'lastname' => mb_substr($faker->lastName, 0, 10),
                'firstname' => mb_substr($faker->firstName, 0, 10),
                'phone' => $faker->regexify('[0-9]{10}'),
                'email' => $faker->email,
            ]);
        }
    }
}
