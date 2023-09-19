<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $credentials = [
            'name' => 'Paul Doe',
            'email' => 'admin@parentvillages.org',
            'password' => '$2y$10$aXGq1MbMWDotUBDGYby4cu5LRkbB3RLN6dXoXMo.tPgIamL1A63T2',
            'avatar' => '../assets/media/admin/avatars/male.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        Admin::insert($credentials);
    }
}
