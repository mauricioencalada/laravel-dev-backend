<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCecySchoolPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //periodo_lectivo
        Schema::connection('pgsql-cecy')->create('school_periods', function (Blueprint $table) {
            $table->id();
            $table->string('code', 100)->comment('codigo del periodo academico'); 
            $table->string('name', 500)->comment(' nombre del periodo academico');
            $table->date('start_date')->comment(' fecha de incio  del periodo academico'); 
            $table->date('end_date')->comment('fecha de finalización del periodo academico'); 
            $table->date('ordinary_start_date')->comment(' fecha de incio  ordinario del periodo academico'); 
            $table->date('ordinary_end_date')->comment(' fecha de incio  finalización del periodo academico'); 
            $table->date('extraordinary_start_date')->comment(' fecha de incio  extraordinaria del periodo academico');
            $table->date('extraordinary_end_date')->comment(' fecha de finalización extraordinario del periodo academico');
            $table->date('especial_start_date')->comment(' fecha de incio especial del periodo academico'); 
            $table->date('especial_end_date')->comment(' fecha de finalización especial del periodo academico'); 
            $table->foreignId('state_id')->constrained("ignug.states")->comment(' estado del periodo academico');
            $table->foreignId('status_id')->constrained('catalogues')->comment('son abierto, cerrado');
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
        Schema::connection('pgsql-cecy')->dropIfExists('school_periods');
    }
}
