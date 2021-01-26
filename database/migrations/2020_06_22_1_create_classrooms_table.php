<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{

    public function up()
    {
        Schema::connection('pgsql-ignug')->create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->string('code', 100)->comment('codigo de aula');
            $table->string('name', 500)->comment('nombre  del aula');
            $table->integer('capacity')->comment('capacidad del aula numerico');
            $table->foreignId('type_id')->constrained('catalogues')->comment('tipo del aula ,oficina,laboratorio,aulasetc');
            $table->string('icon', 200)->nullable()->comment('icono del aula');
            $table->foreignId('state_id')->comment('estado del aula active o disable ');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::connection('pgsql-ignug')->dropIfExists('classrooms');
    }
}
