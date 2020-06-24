<?php

use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('counties')->insert(array(
          array(
            'name' => 'Alba'
          ),
          array(
            'name' => 'Arad'
          ),
          array(
            'name' => 'Arges'
          ),
          array(
            'name' => 'Bacau'
          ),
          array(
            'name' => 'Bihor'
          ),
          array(
            'name' => 'Bistrita-Nasaud'
          ),
          array(
            'name' => 'Botosani'
          ),
          array(
            'name' => 'Braila'
          ),
          array(
            'name' => 'Brasov'
          ),
          array(
            'name' => 'Buzau'
          ),
          array(
            'name' => 'Calarasi'
          ),
          array(
            'name' => 'Cluj'
          ),
          array(
            'name' => 'Caras-Severin'
          ),
          array(
            'name' => 'Constanta'
          ),
          array(
            'name' => 'Covasna'
          ),
          array(
            'name' => 'Dambovita'
          ),
          array(
            'name' => 'Dolj'
          ),
          array(
            'name' => 'Galati'
          ),
          array(
            'name' => 'Giurgiu'
          ),
          array(
            'name' => 'Harghita'
          ),
          array(
            'name' => 'Hunedoara'
          ),
          array(
            'name' => 'Ialomita'
          ),
          array(
            'name' => 'Iasi'
          ),
          array(
            'name' => 'Ilfov'
          ),
          array(
            'name' => 'Maramures'
          ),
          array(
            'name' => 'Mehedinti'
          ),
          array(
            'name' => 'Mures'
          ),
          array(
            'name' => 'Neamt'
          ),
          array(
            'name' => 'Olt'
          ),
          array(
            'name' => 'Prahova'
          ),
          array(
            'name' => 'Salaj'
          ),
          array(
            'name' => 'Satu-Mare'
          ),
          array(
            'name' => 'Sibiu'
          ),
          array(
            'name' => 'Suceava'
          ),
          array(
            'name' => 'Teleorman'
          ),
          array(
            'name' => 'Timis'
          ),
          array(
            'name' => 'Tulcea'
          ),
          array(
            'name' => 'Valcea'
          ),
          array(
            'name' => 'Vaslui'
          ),
          array(
            'name' => 'Vrancea'
          ),
        ));
    }
}
