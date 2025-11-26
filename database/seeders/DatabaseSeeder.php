<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $seeders = File::files(database_path('seeders'));

        foreach ($seeders as $seeder) {

            $class = pathinfo($seeder->getFilename(), PATHINFO_FILENAME);

            // Lewati DatabaseSeeder sendiri
            if ($class === 'DatabaseSeeder') {
                continue;
            }

            // Cek full namespace class
            $fullClass = "Database\\Seeders\\$class";

            if (class_exists($fullClass)) {
                $this->call($fullClass);
            }
        }
    }
}
