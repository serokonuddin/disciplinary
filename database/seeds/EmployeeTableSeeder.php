<?php

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'employee_code' => '10001',
            'employee_name' => 'rokon uddin',
            'ranks' => '2nd Ranks',
            'designation' => 'web developer',
            'organization' => 'CT Health',
            'location' => 'xxxxx xxxx',
            'spds' => 'spds 1',
            'lpds' => 'lpds 1',
            'image' => 'rokon.jpg',
            
        ]);
        DB::table('employees')->insert([
            'employee_code' => '10002',
            'employee_name' => 'Sohidul Islam Tity',
            'ranks' => '3rd Ranks',
            'designation' => 'marketing Officer',
            'organization' => 'CT Health',
            'location' => 'keraniganj dhaka , bangladesh',
            'spds' => 'spds 2',
            'lpds' => 'lpds 2',
            'image' => 'titu.jpg',
            
        ]);
    }
}
