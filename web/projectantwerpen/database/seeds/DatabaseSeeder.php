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
             array('name'=>'Lander Verschueren','email'=>'lander.verschueren@student.kdg.be', 'password' => Hash::make( 'projectant' ), 'type_of_user'=>'admin'),
             array('name'=>'John','email'=>'john@test.be', 'password' => Hash::make( 'password' ), 'type_of_user'=>'regular'),
             array('name'=>'Alexander','email'=>'alexander@test.be', 'password' => Hash::make( 'password' ), 'type_of_user'=>'regular'),
             array('name'=>'Ronny','email'=>'ronny@test.be', 'password' => Hash::make( 'password' ), 'type_of_user'=>'regular')

          ));


         DB::table('projects')->delete();
         //insert some dummy records
         DB::table('projects')->insert(array(
             array('titel' => 'Museum aan de stroom', 'categorie' => 'renovatie', 'uitleg' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
             	sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
             	Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
             	Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
             	'fotonaam' => 'mas.jpg', 'einddatum' => '2011-06-20', 'kostprijs' => '20 miljoen euro', 'fase' => '1', 'likes' => '50', 'aantal_bekeken' => '5432'),
             array('titel' => 'Meir', 'categorie' => 'heraanleg', 'uitleg' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
             	sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
             	Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
             	Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
             	'fotonaam' => 'meir.png', 'einddatum' => '2016-04-01', 'kostprijs' => '40 miljoen euro', 'fase' => '2', 'likes' => '500', 'aantal_bekeken' => '632'),
             array('titel' => 'Grote Markt', 'categorie' => 'opknapwerk', 'uitleg' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
             	sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
             	Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
             	Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
             	'fotonaam' => 'grote_markt.jpg', 'einddatum' => '2013-08-31', 'kostprijs' => '55 miljoen euro', 'fase' => '3', 'likes' => '1345', 'aantal_bekeken' => '6543')
          ));

		DB::table('users_projects')->delete();
         //insert some dummy records
         DB::table('users_projects')->insert(array(
             array('fk_user' => '3', 'fk_project' => '1'),
             array('fk_user' => '5', 'fk_project' => '2'),
             array('fk_user' => '4', 'fk_project' => '3'),
             array('fk_user' => '4', 'fk_project' => '2'),
             array('fk_user' => '3', 'fk_project' => '1')
          ));
    }
}