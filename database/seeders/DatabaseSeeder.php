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
            'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
            'is_admin' => 1,
        ]);

        $user = \App\Models\User::create([
            'name' => 'User',
            'email' => 'user@example.com',
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

        for ($i = 0; $i < 10; $i++) {
            Client::create([
                'lastname' => mb_substr($faker->lastName, 0, 10),
                'firstname' => mb_substr($faker->firstName, 0, 10),
                'phone' => $faker->regexify('[0-9]{10}'),
                'email' => $faker->email,
                'date_of_birth' => $faker->date(),
                'place_of_birth' => $faker->city,
                'gender' => $faker->randomElement(['male', 'female', 'other']),
                'identity_document' => $faker->randomElement(['passport', 'driver_license', 'national_id']),
                'document_number' => $faker->regexify('[A-Z0-9]{10}'),
                'document_issuing_place' => $faker->city,
                'lastname_group_1' => mb_substr($faker->lastName, 0, 10),
                'firstname_group_1' => mb_substr($faker->firstName, 0, 10),
                'date_of_birth_group_1' => $faker->date(),
                'place_of_birth_group_1' => $faker->city,
                'gender_group_1' => $faker->randomElement(['male', 'female', 'other']),
                'identity_document_group_1' => $faker->randomElement(['passport', 'driver_license', 'national_id']),
                'document_number_group_1' => $faker->regexify('[A-Z0-9]{10}'),
                'document_issuing_place_group_1' => $faker->city,
                'lastname_group_2' => mb_substr($faker->lastName, 0, 10),
                'firstname_group_2' => mb_substr($faker->firstName, 0, 10),
                'date_of_birth_group_2' => $faker->date(),
                'place_of_birth_group_2' => $faker->city,
                'gender_group_2' => $faker->randomElement(['male', 'female', 'other']),
                'identity_document_group_2' => $faker->randomElement(['passport', 'driver_license', 'national_id']),
                'document_number_group_2' => $faker->regexify('[A-Z0-9]{10}'),
                'document_issuing_place_group_2' => $faker->city,
            ]);
        }
    }
}
