<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saleproducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('stockproduct_id')->unsigned();

            $table->string('name', 128);
            $table->string('slug', 128)->unique();

            $table->decimal('rel_stock_venta', 8, 4)->default(1);

            $table->boolean('is_enable')->default(1);

            $table->decimal('porc_min', 8, 4)->default(40);

            $table->boolean('is_venta_may')->default(1);
            $table->decimal('porc_may', 8, 4)->default(15);

            $table->boolean('is_venta_directa')->default(1);

            $table->boolean('is_vista_web_min')->default(1);
            $table->boolean('is_vista_web_may')->default(1);

            $table->boolean('is_vista_imp_min')->default(1);
            $table->boolean('is_vista_imp_may')->default(1);

            $table->string('barcode')->nullable();          



            //$table->timestamps();

            //Relationship
            $table->foreign('stockproduct_id')->references('id')->on('stockproducts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saleproducts');
    }
}
