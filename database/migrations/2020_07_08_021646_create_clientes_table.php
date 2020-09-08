<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name', 128);
            $table->string('slug', 128)->unique();

            $table->enum('tipo', ['Minorista','Mayorista']);

            $table->string('telefono', 128);

            $table->string('direccion', 128);

            $table->text('comentario');

            $table->decimal('saldo', 10, 4)->default(0);

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
        Schema::dropIfExists('clientes');
    }
}
