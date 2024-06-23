<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Teste',
            'email' => 't@t.com',
            'password' => Hash::make('12345678'),
            'cpf' => '1234567890',
            'phone' => '1234567890',
            'registration' => '1234567890',
            'idRole' => '98f8c81f-65b0-438f-9c87-099127eff700'
        ]);
    }
}
