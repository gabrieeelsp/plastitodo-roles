<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RubrosTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(StockproductsTableSeeder::class);
        $this->call(SaleproductsTableSeeder::class);
    }
}
