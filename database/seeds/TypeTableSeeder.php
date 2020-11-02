<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;'); //ignore foreign key checks
        \App\Type::truncate(); //remove previous data
        $types = [
            [
                'name' => 'textarea',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'string',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
               'name' => 'radio',
               'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'checkbox',
                'created_at' => \Carbon\Carbon::now()
            ]
        ];

        \App\Type::insert($types);

    }
}
