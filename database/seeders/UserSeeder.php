<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        $user = [
            [
                'name' => 'Wahyu Ramadhani',
                'username' => '11190910000011',
                'password' => 'wahyu',
                'level' => 'Admin',
            ],
            [
                'name' => 'Ramadhani',
                'username' => '11190910000012',
                'password' => 'wahyu',
                'level' => 'Mahasiswa',
            ],
        ];

        DB::table( 'user_views' )->insert( $user );
    }
}