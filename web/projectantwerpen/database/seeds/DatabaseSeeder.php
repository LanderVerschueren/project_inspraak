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
             array('name'=>'Piotr Mazurek','email'=>'mazurek.piotr@student.kdg.be', 'password' => Hash::make( 'projectant' ), 'type_of_user'=>'admin', 'level' => 10, 'rank' => "Level X", 'path_rank_image' => "level10.psd", 'XP' => '20000', 'coins' => '3000', 'coin_multiplier' => 2.0, 'a_points' => 100),
             array('name'=>'Lander Verschueren','email'=>'lander.verschueren@student.kdg.be', 'password' => Hash::make( 'projectant' ), 'type_of_user'=>'admin', 'level' => 10, 'rank' => "Level X", 'path_rank_image' => "level10.psd", 'XP' => '20000', 'coins' => '3000', 'coin_multiplier' => 2.0, 'a_points' => 100),
             array('name'=>'John','email'=>'john@test.be', 'password' => Hash::make( 'password' ), 'type_of_user'=>'regular', 'level' => 5, 'rank' => "Level V", 'path_rank_image' => "level5.psd", 'XP' => '3000', 'coins' => '300', 'coin_multiplier' => 1.3, 'a_points' => 100),
             array('name'=>'Alexander','email'=>'alexander@test.be', 'password' => Hash::make( 'password' ), 'type_of_user'=>'regular', 'level' => 2, 'rank' => "Level II", 'path_rank_image' => "level2.psd", 'XP' => '500', 'coins' => '20', 'coin_multiplier' => 1.1, 'a_points' => 100),
             array('name'=>'Ronny','email'=>'ronny@test.be', 'password' => Hash::make( 'password' ), 'type_of_user'=>'regular', 'level' => 1, 'rank' => "Level I", 'path_rank_image' => "level1.psd", 'XP' => '200', 'coins' => '30', 'coin_multiplier' => 1.0, 'a_points' => 100)

          ));


         DB::table('projects')->delete();
         //insert some dummy records
         DB::table('projects')->insert(array(
             array('titel' => 'Museum aan de stroom', 'categorie' => 'renovatie', 'uitleg' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
             	sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
             	Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
             	Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
             	'fotonaam' => 'mas.jpg', 'locatie' => 'Het Eilandje','einddatum' => '2011-06-20', 'kostprijs' => '20 miljoen euro', 'fase' => '1', 'likes' => '50','dislikes' => '2', 'aantal_bekeken' => '5432', 'vraag' => 'Wilt u meer banken rond het MAS?'),
             array('titel' => 'Meir', 'categorie' => 'heraanleg', 'uitleg' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
             	sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
             	Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
             	Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
             	'fotonaam' => 'meir.png', 'locatie' => 'meir', 'einddatum' => '2016-04-01', 'kostprijs' => '40 miljoen euro', 'fase' => '2', 'likes' => '500', 'dislikes' => '20', 'aantal_bekeken' => '632', 'vraag' => 'Wilt u meer vuilbakken op de meir?'),
             array('titel' => 'Grote Markt', 'categorie' => 'opknapwerk', 'uitleg' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
             	sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
             	Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
             	Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
             	'fotonaam' => 'grote_markt.jpg', 'locatie' => 'Grote Markt', 'einddatum' => '2013-08-31', 'kostprijs' => '55 miljoen euro', 'fase' => '3', 'likes' => '1345', 'dislikes' => '150','aantal_bekeken' => '6543', 'vraag' => 'Wilt u meer groen op de Grote Markt?')
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

         DB::table('comments')->delete();
         //insert some dummy records
         DB::table('comments')->insert(array(
             array('fk_user' => '3', 'fk_project' => '1', "comment" => "ik vind dit een heel mmoi project"),
             array('fk_user' => '5', 'fk_project' => '2', "comment" => "Wauw zo een mooie website!"),
             array('fk_user' => '4', 'fk_project' => '3', "comment" => "Team Bananas zijn de knapste!!"),
             array('fk_user' => '4', 'fk_project' => '2', "comment" => "Woef"),
             array('fk_user' => '3', 'fk_project' => '1', "comment" => "Goed idee"),
             array('fk_user' => null, 'fk_project' => '1', "comment" => "Goed idee")
          ));
    }
}