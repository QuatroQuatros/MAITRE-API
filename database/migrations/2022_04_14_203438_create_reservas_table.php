<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->time('horario');
            $table->date('data');
            $table->string('diaSemana');
            $table->integer('qtdPessoas');
            $table->dateTime('horaCheckIn')->nullable();;
            $table->dateTime('horaCheckOut')->nullable();;
            $table->dateTime('duracao')->nullable();;
            $table->foreignId('status_reserva_id')->constrained()->default(1);
            $table->foreignId('cliente_id')->constrained();
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
        Schema::dropIfExists('reservas');
    }
}
