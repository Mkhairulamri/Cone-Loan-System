<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PengadaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i<10;$i++){
            DB::table('pengadaan_cone')->insert([
                'nama_pengadaan'=>$faker->paragraph(),
                'jumlah_pengadaan'=>$faker->numberBetween(40,100),
                'bulan'=>$faker->numberBetween(1,12),
                'tahun'=>$faker->numberBetween(2015,2022)
            ]);
        }
    }
}
