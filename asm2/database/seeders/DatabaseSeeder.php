<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Le Ha Nam',
            'email' => 'lehanam3570@gmail.com',
            'password' => Hash::make('namtrung12'),
            'diachi' => 'TPHCM',
            'idgroup' => 1,
            'nghenghiep' => 'Sinh viên',
            'phai' => 'Nam',
        ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
