<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPlanificationsTable extends Migration
{
    /**
     * Run the migrations.
     
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql-cecy')->create('planifications', function (Blueprint $table) {
            $table->id();
            $table->date('date_start')->nullable();
            $table->date('date_end')->nullable();
            $table->string('summary',1000); //resumen
            $table->date('planned_end_date'); //fecha fin prevista
            $table->foreignId('course_id')->constrained('courses');//cursos_id
            $table->foreignId('instructor_id')->constrained('instructors');
            $table->foreignId('state_id')->constrained('ignug.states');//stado_id
            // $table->foreignId('status_id')->constrained('catalogues');//status de la planificacion
           // $table->foreignId('schedule_id')->constrained('schedule');//horario
            $table->foreignId('school_period_id')->constrained('school_periods');//periodo_id
            // $table->foreignId('classroom_id')->constrained('ignug.classrooms');//id_aula
            $table->integer('capacity'); //capacidad_curso
            $table->string('observation',1000); //observaciones
            $table->foreignId('conference')->constrained('catalogues'); //jornada
            // $table->foreignId('responsible_id')->constrained('authorities'); //id autoridad a cargo responsable
            $table->foreignId('parallel')->constrained('catalogues'); //jornada
            $table->json('needs'); //necesidades del curso es un array
            $table->date('need_date'); //fecha_registro de necesidad
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
        Schema::connection('pgsql-cecy')->dropIfExists('planifications');
    }
}
