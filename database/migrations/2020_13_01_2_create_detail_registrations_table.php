<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //detalle_matriculas
        Schema::connection('pgsql-cecy')->create('detail_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->constrained('registrations'); //id_matricula
            $table->foreignId('state_id')->constrained('ignug.states'); //id_matricula
            $table->foreignId('status_id')->constrained('catalogues'); //estado de la matricula
            $table->foreignId('status_certificate_id')->constrained('catalogues'); //estado del certificado
            $table->decimal('final_grade', 3, 2); //nota_final
            $table->date('certificate_withdrawn'); //fecha de retiro certificado
            $table->json('observation'); //observacion_curso
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
        Schema::connection('pgsql-cecy')->dropIfExists('detail_registrations');
    }
}
