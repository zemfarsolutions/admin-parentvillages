<?php

namespace Database\Seeders;

use App\Models\ScholarshipQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScholarshipQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                "name" => "Please list your extracurricular activities (sports, faith-based groups/activities, arts, etc.):" ,
                'type' => "service"
            ],
            [
                "name" => "Please list your community service and/or civic engagement activities",
                'type' => "service"
            ],
            [
                "name" => "Question" ,
                'type' => "event"
            ],
        ];

        ScholarshipQuestion::insert($questions);
    }
}
