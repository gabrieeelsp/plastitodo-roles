<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockproducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('category_id')->unsigned();

            $table->string('name', 128);
            $table->string('slug', 128)->unique();

            $table->decimal('costo', 8, 4)->default(0);
            $table->decimal('stock', 8, 2)->default(0);

            $table->boolean('web_enable')->default(1);
            $table->boolean('is_enable')->default(1);

            $table->foreign('category_id')->references('id')->on('categories')
              ->onDelete('cascade')
              ->onUpdate('cascade');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stockproducts');
    }
}
