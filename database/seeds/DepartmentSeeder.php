<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->delete();
        DB::table('departments')->insert([
           ["name"=> "Technology"],
           ["name"=> "Accounting"],
           ["name"=> "Sporting"],
           

        ]);
    }
}
