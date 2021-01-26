<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolPeriodsTable extends Migration
{

    public function up()
    {
        Schema::connection('pgsql-ignug')->create('school_periods', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->comment('codigo del periodo academico');
            $table->string('name')->unique()->comment('nombre del periodo academico');
            $table->date('start_date')->comment('fecha de incio de  del periodo academico');
            $table->date('end_date')->comment('fecha de finalización del periodo academico');
            $table->date('ordinary_start_date')->comment('fecha de incio del periodo ordinario');
            $table->date('ordinary_end_date')->comment('fecha de finalización del periodo ordinario');
            $table->date('extraordinary_start_date')->comment('fecha de incio del periodo extraordinario');
            $table->date('extraordinary_end_date')->comment('fecha de finalización del periodo extraordinario');
            $table->date('especial_start_date')->comment('fecha de incio del periodo especial');
            $table->date('especial_end_date')->comment('fecha de finalización del periodo especial');
            $table->foreignId('status_id')->constrained('catalogues')->comment('son abierto, cerrado');
            $table->foreignId('state_id')->comment('estado activo o disable del esquema ingug');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::connection('pgsql-ignug')->dropIfExists('school_periods');
    }
}
