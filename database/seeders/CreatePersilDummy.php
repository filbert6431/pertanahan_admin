<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class CreatePersilDummy extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Ambil ID warga yang benar-benar ada
        $wargaIds = DB::table('warga')->pluck('warga_id')->toArray();

        foreach (range(1, 50) as $index) {
            DB::table('persil')->insert([
                'kode_persil'      => 'PERSIL-' . $faker->unique()->numerify('#####'),
                'pemilik_warga_id' => $faker->randomElement($wargaIds),
                'luas_m2'          => $faker->randomFloat(2, 50, 1000),
                'penggunaan'       => $faker->randomElement(['Perumahan', 'Pertanian', 'Perdagangan', 'Industri']),
                'alamat_lahan'     => $faker->address(),
                'rt'               => $faker->numberBetween(1, 10),
                'rw'               => $faker->numberBetween(1, 10),
                'status'           => $faker->randomElement(['pending', 'approved', 'rejected']),
            ]);
        }
    }
}
