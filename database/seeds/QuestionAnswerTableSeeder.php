<?php

use Illuminate\Database\Seeder;

class QuestionAnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;'); //ignore foreign key checks
        \App\QuestionAnswer::truncate(); // removes previous data from table
        $faker = \Faker\Factory::create();
        foreach (range(1,20) as $index) {
            \App\QuestionAnswer::insert([
                'question_id' => rand(1,10),
                'answer' => $index % 3 ==0 ? NULL : $faker->word, //If index divisible bu 3 the answer will be null or it will be random words
                'created_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}
