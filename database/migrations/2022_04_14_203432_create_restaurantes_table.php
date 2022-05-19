<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('restaurantes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->string('foto', 400)->nullable();
            $table->string('cardapio', 500)->nullable();
            $table->string('cep');
            $table->integer('numero');
            $table->foreignId('categoria_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurantes');
    }
}
