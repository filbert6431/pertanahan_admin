<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisPenggunaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_penggunaan')->insert([
            [
                'nama_penggunaan' => 'Pemukiman',
                'keterangan'      => 'Digunakan untuk bangunan tempat tinggal penduduk',
            ],
            [
                'nama_penggunaan' => 'Pertanian',
                'keterangan'      => 'Lahan untuk kegiatan pertanian seperti sawah, ladang',
            ],
            [
                'nama_penggunaan' => 'Perkebunan',
                'keterangan'      => 'Lahan untuk tanaman perkebunan (karet, kelapa sawit, dll)',
            ],
            [
                'nama_penggunaan' => 'Industri',
                'keterangan'      => 'Untuk kegiatan industri dan pabrik',
            ],
            [
                'nama_penggunaan' => 'Fasilitas Umum',
                'keterangan'      => 'Sarana publik seperti sekolah, rumah sakit, tempat ibadah',
            ],
            [
                'nama_penggunaan' => 'Komersial',
                'keterangan'      => 'Untuk usaha perdagangan dan jasa',
            ],

            ['nama_penggunaan' => 'perdagangan',
                'keterangan'       => 'Untuk kegiatan perdagangan/jual beli',
            ],

            [
                'nama_penggunaan' => 'Kosong/Tidak Terpakai',
                'keterangan'      => 'Lahan yang belum dimanfaatkan',
            ],
        ]);
    }
}
