<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
         //insert some dummy records
         DB::table('users')->insert(array(
             array('name'=>'Piotr Mazurek','email'=>'mazurek.piotr@student.kdg.be', 'password' => Hash::make( 'projectant' ), 'type_of_user'=>'admin'),
             array('name'=>'Lander Verschueren','email'=>'lander.erschueren@student.kdg.be', 'password' => Hash::make( 'projectant' ), 'type_of_user'=>'admin'),
             array('name'=>'John','email'=>'john@test.be', 'password' => Hash::make( 'password' ), 'type_of_user'=>'regular'),
             array('name'=>'Alexander','email'=>'alexander@test.be', 'password' => Hash::make( 'password' ), 'type_of_user'=>'regular'),
             array('name'=>'Ronny','email'=>'ronny@test.be', 'password' => Hash::make( 'password' ), 'type_of_user'=>'regular')

          ));
    }
}