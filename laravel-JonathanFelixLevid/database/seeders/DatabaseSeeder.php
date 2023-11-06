<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Prodi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            Prodi::Create(
                [
                    'nama' => 'Teknik Informatika'
                ]
            );
            Prodi::Create(
                [
                    'nama' => 'Mananjemen Informatika'
                ]
            );
            Prodi::Create(
                [
                    'nama' => 'Sistem Informasi'
                ]
            );
    }
}
