<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nome' => 'admin',
                'cpf' => 'admin',
                'email' => 'admin@senacrs.com',
                'senha' => Hash::make('admin'),
                'permissao' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'moderador',
                'cpf' => 'moderador',
                'email' => 'moderador@senacrs.com',
                'senha' => Hash::make('moderador'),
                'permissao' => 'moderador',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'leitor',
                'cpf' => 'leitor',
                'email' => 'leitor@senacrs.com',
                'senha' => Hash::make('leitor'),
                'permissao' => 'leitor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Aécio Brumel',
                'cpf' => '12345678900',
                'email' => 'aecio@senacrs.com',
                'senha' => Hash::make('1234'),
                'permissao' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
