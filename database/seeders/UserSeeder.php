<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $credentials = [
            'name' => 'John Doe',
            'email' => 'client@parentvillages.org',
            'password' => '$2y$10$aXGq1MbMWDotUBDGYby4cu5LRkbB3RLN6dXoXMo.tPgIamL1A63T2',
            'avatar' => '../assets/media/client/avatars/male.png',
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        User::insert($credentials);
    }
}
