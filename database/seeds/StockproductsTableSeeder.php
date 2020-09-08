<?php

use Illuminate\Database\Seeder;

class StockproductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* ----- 01 Granas de color Begin ------*/

        App\Stockproduct::create([
            'name' => 'Grana 1,00 Kg BLANCO DECORMAGIC',
            'category_id' => '1',
        ]);

        App\Stockproduct::create([
            'name' => 'Grana 1,00 Kg ROJO DECORMAGIC',
            'category_id' => '1',
        ]);

        App\Stockproduct::create([
            'name' => 'Grana 1,00 Kg AMARILLO DECORMAGIC',
            'category_id' => '1',
        ]);

        /* ----- 01 Granas de color End ------*/

        /* ----- 02 Conos de oblea Begin ------*/
        App\Stockproduct::create([
            'name' => 'Cono Nro 0',
            'category_id' => '2',
        ]);

        /* ----- 02 Conos de oblea End ------*/

        /* ----- 03 Dulce de Leche Begin ------*/
        App\Stockproduct::create([
            'name' => 'Dulce de Leche  3,00 Kg EUREKA',
            'category_id' => '3',
        ]);

        App\Stockproduct::create([
            'name' => 'Dulce de Leche 10,00 Kg EUREKA',
            'category_id' => '3',
        ]);

        App\Stockproduct::create([
            'name' => 'Dulce de Leche  5,00 Kg EUREKA',
            'category_id' => '3',
        ]);

        /* ----- 03 Dulce de Leche End ------*/
    }
}
