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
             array('name'=>'Piotr Mazurek', 'password' => Hash::make( 'projectant' ), 'type_of_user'=>'admin'),
             array('name'=>'Lander Verschueren', 'password' => Hash::make( 'projectant' ), 'type_of_user'=>'admin'),
             array('name'=>'John', 'password' => Hash::make( 'password' ), 'type_of_user'=>'regular'),
             array('name'=>'Alexander', 'password' => Hash::make( 'password' ), 'type_of_user'=>'regular'),
             array('name'=>'Ronny', 'password' => Hash::make( 'password' ), 'type_of_user'=>'regular')

          ));
    }
}