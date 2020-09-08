<?php

use Illuminate\Database\Seeder;

class SaleproductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* ----- 01 Grana 1,00 Kg BLANCO DECORMAGIC Begin ------*/

        App\Saleproduct::create([
            'name' => 'Grana 1,00 Kg BLANCO DECORMAGIC',
            'stockproduct_id' => '1',
        ]);
        App\Saleproduct::create([
            'name' => 'Grana 0,10 Kg BLANCO DECORMAGIC',
            'stockproduct_id' => '1',
        ]);

        /* ----- 01 Grana 1,00 Kg BLANCO DECORMAGIC End ------*/

        /* ----- 02 Grana 1,00 Kg ROJO DECORMAGIC Begin ------*/

        App\Saleproduct::create([
            'name' => 'Grana 1,00 Kg ROJO DECORMAGIC',
            'stockproduct_id' => '2',
        ]);
        App\Saleproduct::create([
            'name' => 'Grana 0,10 Kg ROJO DECORMAGIC',
            'stockproduct_id' => '2',
        ]);

        /* ----- 02 Grana 1,00 Kg ROJO DECORMAGIC End ------*/

        /* ----- 03 Grana 1,00 Kg AMARiILLO DECORMAGIC Begin ------*/

        App\Saleproduct::create([
            'name' => 'Grana 1,00 Kg AMARiILLO DECORMAGIC',
            'stockproduct_id' => '3',
        ]);
        App\Saleproduct::create([
            'name' => 'Grana 0,10 Kg AMARiILLO DECORMAGIC',
            'stockproduct_id' => '3',
        ]);

        /* ----- 03 Grana 1,00 Kg AMARiILLO DECORMAGIC End ------*/

        

        /* ----- 04 Cono Nro 0 Begin ------*/
        App\Saleproduct::create([
            'name' => 'Cono Nro 0 CAJA x1700',
            'stockproduct_id' => '4',
        ]);
        App\Saleproduct::create([
            'name' => 'Cono Nro 0 PAQ x100',
            'stockproduct_id' => '4',
        ]);

        /* ----- 04 Cono Nro 0 End ------*/

        /* ----- 05 Dulce de Leche  3,00 Kg EUREKA Begin ------*/
        App\Saleproduct::create([
            'name' => 'Dulce de Leche  3,00 Kg EUREKA',
            'stockproduct_id' => '5',
        ]);

        /* ----- 05 Dulce de Leche  3,00 Kg EUREKA End ------*/

        /* ----- 06 Dulce de Leche 10,00 Kg EUREKA Begin ------*/
        App\Saleproduct::create([
            'name' => 'Dulce de Leche 10,00 Kg EUREKA',
            'stockproduct_id' => '6',
        ]);
        App\Saleproduct::create([
            'name' => 'Dulce de Leche 1,00 Kg EUREKA',
            'stockproduct_id' => '6',
        ]);

        /* ----- 06 Dulce de Leche 10,00 Kg EUREKA End ------*/

        /* ----- 07 Dulce de Leche  5,00 Kg EUREKA Begin ------*/
        App\Saleproduct::create([
            'name' => 'Dulce de Leche  5,00 Kg EUREKA',
            'stockproduct_id' => '7',
        ]);

        /* ----- 07 Dulce de Leche  5,00 Kg EUREKA End ------*/
    }
}
