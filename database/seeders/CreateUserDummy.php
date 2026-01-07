<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class CreateUserDummy extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $i) {

            $name = $faker->name();

            DB::table('users')->insert([
                'name'            => $name,
                'email'           => $faker->unique()->safeEmail(),
                'status'          => $faker->randomElement(['Aktif', 'Nonaktif']),
                'role'            => $faker->randomElement(['admin', 'user']),
                'password'        => Hash::make('password'),

            ]);
        }
    }
}
