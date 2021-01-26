<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCecyAuthoritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql-cecy')->create('authorities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('authentication.users')->comment('usuario clave foreanea de Authentication.user ');
            $table->foreignId('state_id')->constrained('ignug.states')->comment('estado activo o inactivo de sate ignug');
            $table->foreignId('status_id')->constrained('catalogues')->comment('datos como suspendio o retirado de catologue');
            $table->foreignId('position_id')->constrained('catalogues')->comment('datos como especialista,responsable de cecy,logistica');
            $table->date('start_position')->comment('fecha inicio cargo'); 
            $table->date('end_position')->comment('fecha fin cargo'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('pgsql-cecy')->dropIfExists('authorities');
    }
}
