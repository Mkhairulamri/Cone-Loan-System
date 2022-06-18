<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\CarbonImmutable;

class PeminjamanSeeder extends Seeder
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
            
            $no_hp = $faker->numerify('081########');
            $name = $faker->name();
            $date = CarbonImmutable::createFromTimeStamp($faker->dateTimeBetween('-7 days', '+7 days')->getTimestamp());
            $tgl_mulai = $date->add(2,'day');
            $jumlah =$faker->numberBetween(10,25);

            DB::table('peminjaman_cone')->insert([
                'nama_peminjam'=>$name,
                'email'=>$name."@gmail.com",
                'no_hp'=>$no_hp,
                'jumlah_peminjaman'=>$jumlah,
                'lembaga'=> $faker->name(),
                'alamat'=> $faker->sentence($nbWords = random_int(1, 10), $variableNbWords = true),
                'alasan_peminjaman' => $faker->paragraph(),
                'surat_peminjaman' => $name.$faker->name(),
                'waktu_mulai'=> $tgl_mulai,
                'waktu_pengembalian'=> $tgl_mulai->add(4,'day'),
                'status_pengembalian'=> random_int(0,1),
                'jumlah_kerusakan' =>random_int(0,$jumlah),
                'keterlambatan_pengembalian'=>random_int(0,1),
                'alasan_keterlambatan'=>$faker->name()
            ]);
        }
    }
}
