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
            'county' => 'Alba'
          ),
          array(
            'county' => 'Arad'
          ),
          array(
            'county' => 'Arges'
          ),
          array(
            'county' => 'Bacau'
          ),
          array(
            'county' => 'Bihor'
          ),
          array(
            'county' => 'Bistrita-Nasaud'
          ),
          array(
            'county' => 'Botosani'
          ),
          array(
            'county' => 'Braila'
          ),
          array(
            'county' => 'Brasov'
          ),
          array(
            'county' => 'Buzau'
          ),
          array(
            'county' => 'Calarasi'
          ),
          array(
            'county' => 'Cluj'
          ),
          array(
            'county' => 'Caras-Severin'
          ),
          array(
            'county' => 'Constanta'
          ),
          array(
            'county' => 'Covasna'
          ),
          array(
            'county' => 'Dambovita'
          ),
          array(
            'county' => 'Dolj'
          ),
          array(
            'county' => 'Galati'
          ),
          array(
            'county' => 'Giurgiu'
          ),
          array(
            'county' => 'Harghita'
          ),
          array(
            'county' => 'Hunedoara'
          ),
          array(
            'county' => 'Ialomita'
          ),
          array(
            'county' => 'Iasi'
          ),
          array(
            'county' => 'Ilfov'
          ),
          array(
            'county' => 'Maramures'
          ),
          array(
            'county' => 'Mehedinti'
          ),
          array(
            'county' => 'Mures'
          ),
          array(
            'county' => 'Neamt'
          ),
          array(
            'county' => 'Olt'
          ),
          array(
            'county' => 'Prahova'
          ),
          array(
            'county' => 'Salaj'
          ),
          array(
            'county' => 'Satu-Mare'
          ),
          array(
            'county' => 'Sibiu'
          ),
          array(
            'county' => 'Suceava'
          ),
          array(
            'county' => 'Teleorman'
          ),
          array(
            'county' => 'Timis'
          ),
          array(
            'county' => 'Tulcea'
          ),
          array(
            'county' => 'Valcea'
          ),
          array(
            'county' => 'Vaslui'
          ),
          array(
            'county' => 'Vrancea'
          ),
        ));
    }
}
