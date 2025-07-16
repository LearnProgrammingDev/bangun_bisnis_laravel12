<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class HumanResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('kantor')->insert([
            [
                'nama' => 'HR',
                'description' => 'Kantor Pengelolaan Manusia',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'IT',
                'description' => 'Kantor Pengelolaan Teknologi',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Sales',
                'description' => 'Kantor Pengelolaan Perdagangan',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        DB::table('roles')->insert([
            [
                'title' => 'HR',
                'description' => 'Handling Resources',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Developer',
                'description' => 'Handling Teknologi',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Sales',
                'description' => 'Handling Perdagangan',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        DB::table('pegawai')->insert([
            [
                'nama_lengkap' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'nohp' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'tanggal_lahir' => $faker->dateTimeBetween('-40 years', '-20 years'),
                'hire_date' => Carbon::now(),
                'kantor_id' => 1,
                'role_id' => 1,
                'status' => 'active',
                'salary' => $faker->randomFloat(2, 3000, 6000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
            [
                'nama_lengkap' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'nohp' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'tanggal_lahir' => $faker->dateTimeBetween('-40 years', '-20 years'),
                'hire_date' => Carbon::now(),
                'kantor_id' => 1,
                'role_id' => 1,
                'status' => 'active',
                'salary' => $faker->randomFloat(2, 3000, 6000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ]
        ]);

        DB::table('tugas')->insert([
            [
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph(),
                'assigned_to' => 1,
                'tanggal_selesai' => Carbon::parse('2025-07-19'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph(),
                'assigned_to' => 1,
                'tanggal_selesai' => Carbon::parse('2025-07-19'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('gaji')->insert([
            [
                'pegawai_id' => 1,
                'gaji' => $faker->randomFloat(2, 3000, 6000),
                'bonus' => $faker->randomFloat(2, 3000, 6000),
                'potongan' => $faker->randomFloat(2, 500, 1000),
                'gaji_alter_potongan' => $faker->randomFloat(2, 3000, 6000),
                'tanggal_gajian' => Carbon::parse('2025-07-19'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'pegawai_id' => 2,
                'gaji' => $faker->randomFloat(2, 3000, 6000),
                'bonus' => $faker->randomFloat(2, 3000, 6000),
                'potongan' => $faker->randomFloat(2, 500, 1000),
                'gaji_alter_potongan' => $faker->randomFloat(2, 3000, 6000),
                'tanggal_gajian' => Carbon::parse('2025-07-19'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);


        DB::table('absensi')->insert([
            [
                'pegawai_id' => 1,
                'masuk_kantor' => Carbon::parse('2025-07-19 09:00:00'),
                'keluar_kantor' => Carbon::parse('2025-07-19 17:00:00'),
                'tanggal_absen' => Carbon::parse('2025-07-19'),
                'status' => 'hadir',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'pegawai_id' => 2,
                'masuk_kantor' => Carbon::parse('2025-07-19 09:00:00'),
                'keluar_kantor' => Carbon::parse('2025-07-19 17:00:00'),
                'tanggal_absen' => Carbon::parse('2025-07-19'),
                'status' => 'hadir',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);


        DB::table('cuti')->insert([
            [
                'pegawai_id' => 1,
                'cuti_apa' => 'sakit',
                'mulai_cuti' => Carbon::parse('2025-07-20'),
                'akhir_cuti' => Carbon::parse('2025-07-25'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'pegawai_id' => 2,
                'cuti_apa' => 'liburan',
                'mulai_cuti' => Carbon::parse('2025-07-20'),
                'akhir_cuti' => Carbon::parse('2025-07-25'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
