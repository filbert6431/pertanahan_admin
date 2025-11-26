<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class CreateAdminDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('admin')->insert([
                'name'          => $faker->name(),
                'email'         => $faker->unique()->safeEmail (),
                'status'        => $faker->randomElement(['Aktif', 'Nonaktif']),
                'password' => Hash::make($faker->password())
            ]);
    }
}
}
