<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* ----- 01 REPOSTERIA Begin ------*/
        App\Category::create([
            'name' => 'Granas de color',
            'rubro_id' => '1',
        ]);

        App\Category::create([
            'name' => 'Conos de oblea',
            'rubro_id' => '1',
        ]);

        App\Category::create([
            'name' => 'Dulce de Leche',
            'rubro_id' => '1',
        ]);


        /* ----- 01 REPOSTERIA End ------*/
        
        
    }
}
