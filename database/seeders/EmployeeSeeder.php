<?php

namespace Database\Seeders;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $credentials = [
            'name' => 'Leo Walker',
            'email' => 'employee@gmail.com',
            'password' => '$2y$10$aXGq1MbMWDotUBDGYby4cu5LRkbB3RLN6dXoXMo.tPgIamL1A63T2',
            'avatar' => '../assets/media/employee/avatars/male.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        Employee::insert($credentials);
    }
}
