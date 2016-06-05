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
             array('name'=>'Piotr Mazurek','email'=>'mazurek.piotr@student.kdg.be', 'password' => Hash::make( 'projectant' ),
              'type_of_user'=>'admin', 'level' => 10, 'rank' => "Level X", 'path_rank_image' => "level10.psd", 'XP' => '20000', 'coins' => '3000', 'coin_multiplier' => 2.0, 'a_points' => 100),
             array('name'=>'Lander Verschueren','email'=>'lander.verschueren@student.kdg.be', 'password' => Hash::make( 'projectant' ),
              'type_of_user'=>'admin', 'level' => 10, 'rank' => "Level X", 'path_rank_image' => "level10.psd", 'XP' => '20000', 'coins' => '3000', 'coin_multiplier' => 2.0, 'a_points' => 100),
             array('name'=>'John','email'=>'john@test.be', 'password' => Hash::make( 'password' ),
              'type_of_user'=>'regular', 'level' => 5, 'rank' => "Level V", 'path_rank_image' => "level5.psd", 'XP' => '3000', 'coins' => '300', 'coin_multiplier' => 1.3, 'a_points' => 100),
             array('name'=>'Alexander','email'=>'alexander@test.be', 'password' => Hash::make( 'password' ),
              'type_of_user'=>'regular', 'level' => 2, 'rank' => "Level II", 'path_rank_image' => "level2.psd", 'XP' => '500', 'coins' => '20', 'coin_multiplier' => 1.1, 'a_points' => 100),
             array('name'=>'Ronny','email'=>'ronny@test.be', 'password' => Hash::make( 'password' ),
              'type_of_user'=>'regular', 'level' => 1, 'rank' => "Level I", 'path_rank_image' => "level1.psd", 'XP' => '200', 'coins' => '30', 'coin_multiplier' => 1.0, 'a_points' => 100)
          ));


         DB::table('projects')->delete();
         //insert some dummy records
         DB::table('projects')->insert(array(
             array('title' => 'Museum aan de stroom', 'category' => 'renovatie', 'description' => 'Het MAS of Museum aan de Stroom is een museum in Antwerpen, dat in mei 2011 opende. Het museum is gelegen in de oude haven op het Eilandje. Het grondoppervlakte van het museumgebouw bedraagt 1.350 m², op een totale oppervlakte van 14.500 m². De totale hoogte van het torengebouw bedraagt 62 meter en is daarmee een nieuw oriëntatiepunt in de stad. Het panoramazicht en de spiraalvormige boulevard langs de glaspartijen van het gebouw zijn tot in de avond laat gratis toegankelijk en vormen zo een nieuwe toeristische trekpleister. Het gebouw is een ontwerp van Neutelings Riedijk Architecten. De renovatie zal doorgaan op het dak. Omdat dit gebouw zo een toeristische trekpleister is denken we dat er meer banken rond het MAS moeten komen. Wat vindt u er van?',
             	'image_name' => 'mas.jpg', 'location' => 'Het Eilandje','date' => '2011-06-20', 'cost' => '200000', 'phase' => '1',  'view_amount' => '5432', 'question' => 'Wilt u meer banken rond het MAS?'),
             array('title' => 'Meir', 'category' => 'heraanleg', 'description' => 'De Meir is één van de belangrijkste winkelstraten in de Belgische stad Antwerpen. Samen met de De Keyserlei, de Teniersplaats en de Leysstraat vormt de Meir de verbinding tussen het Centraal Station en het historische centrum van de stad Antwerpen. De Meir is autovrij (de premetro rijdt onder de straat) en is een van de belangrijkste commerciële trekpleisters van de stad. Naast vele kleine winkeltjes hebben de meeste grote (kleding)winkelketens zoals H&M, C&A en WE er een vestiging. De meeste winkels zijn ondergebracht in de historische panden die de straat rijk is. Op de Meir bevindt zich het (Koninklijk) Paleis op de Meir en de Stadsfeestzaal. Beide zijn recentelijk gerenoveerd en de Stadsfeestzaal doet nu dienst als een luxueus shoppingcenter. De Wapper, met het Rubenshuis, komt uit op de Meir. Voor veel Antwerpenaren is het ook een geliefkoosde plek om te "flaneren": zien en gezien worden. Sommige stenen banken hebben vervanging nodig. We willen jullie ook vragen of jullie meer vuilbakken op de meir willen.',
             	'image_name' => 'meir.png', 'location' => 'meir', 'date' => '2016-04-01', 'cost' => '120000', 'phase' => '2', 'view_amount' => '98', 'question' => 'Wilt u meer vuilbakken op de meir?'),
             array('title' => 'Grote Markt', 'category' => 'opknapwerk', 'description' => 'Het stadhuis is gebouwd tussen 1561 en 1564 naar het ontwerp van Cornelis II Floris de Vriendt. Het is een meesterwerk waarin Vlaamse en Italiaanse invloeden zijn geïntegreerd. De dakvenster en topgevel zijn duidelijk van Vlaamse origine terwijl de loggia, nissen en de pilasters getuigen van Italiaanse invloed. Typerend voor de renaissance is de beklemtoning van de horizontale lijn. Het stadhuis wordt door velen gezien als een hoogtepunt van de renaissance in de Nederlanden. Dit gezegde, vroegen we ons iets af: wilt u dat er meer groen op de Grote Markt komt?',
             	'image_name' => 'grote_markt.jpg', 'location' => 'Grote Markt', 'date' => '2013-08-31', 'cost' => '200000', 'phase' => '3', 'view_amount' => '851', 'question' => 'Wilt u meer groen op de Grote Markt?')
          ));

		DB::table('users_projects')->delete();
         //insert some dummy records
         DB::table('users_projects')->insert(array(
             array('fk_user' => '3', 'fk_project' => '1', 'like' => true),
             array('fk_user' => '5', 'fk_project' => '2', 'like' => true),
             array('fk_user' => '4', 'fk_project' => '3', 'like' => false),
             array('fk_user' => '4', 'fk_project' => '2', 'like' => true),
             array('fk_user' => '3', 'fk_project' => '1', 'like' => false),
             array('fk_user' => '1', 'fk_project' => '1', 'like' => true ),
             array('fk_user' => null, 'fk_project' => '3', 'like' => true ),
             array('fk_user' => '2', 'fk_project' => '2', 'like' => true ),
             array('fk_user' => null, 'fk_project' => '3', 'like' => true ),
             array('fk_user' => '3', 'fk_project' => '2', 'like' => true ),
             array('fk_user' => null, 'fk_project' => '3', 'like' => false )
          ));

         DB::table('comments')->delete();
         //insert some dummy records
         DB::table('comments')->insert(array(
             array('fk_user' => '3', 'fk_project' => '1', "comment" => "Top idee! Misschien een picknick-hotspot van maken!"),
             array('fk_user' => null, 'fk_project' => '2', "comment" => "Voor mij moet er niets veranderen aan de Meir."),
             array('fk_user' => '5', 'fk_project' => '2', "comment" => "Meer vuilbakken op de meir is inderdaad een goed idee!"),
             array('fk_user' => '4', 'fk_project' => '3', "comment" => "De grote markt was altijd een plein met hier en daar wat bomen. Laten we het zo houden."),
             array('fk_user' => '4', 'fk_project' => '2', "comment" => "Sommige banken zijn aan vervanging toe. Goed dat jullie dit hebben opgemerkt."),
             array('fk_user' => '3', 'fk_project' => '1', "comment" => "Dit vind ik niet echt nodig. Ik ga niet speciaal op dat plein zitten om naar het Mas te staren."),
             array('fk_user' => null, 'fk_project' => '1', "comment" => "Meer banken zijn altijd handig!"),
             array('fk_user' => null, 'fk_project' => '2', "comment" => "Ik vind dat er genoeg vuilbakken op de meir zijn."),
             array('fk_user' => '5', 'fk_project' => '3', "comment" => "Leuk idee!"),

          ));
    }
}