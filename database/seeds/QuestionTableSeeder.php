<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;'); //ignore foreign key checks
        \App\Question::truncate(); // removes previous data from table
        $faker = \Faker\Factory::create();
        foreach (range(1,10) as $index) {

            $day = rand(1,2); //generate random dates between 1 to 3
            $date = \Carbon\Carbon::create(2020,11,$day); //generate random dates between 2020-11-1 to 2

            \App\Question::insert([
                'type_id' => rand(1,4),
                'name' => $faker->sentence(10), //generate 10 random sentence
                'date' => $date->format('Y-m-d'),
                'is_required' => rand(0,1),
                'optional_description' => $faker->paragraph(3), //generate 3 random paragraph
                'created_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}
