<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //cursos
        Schema::connection('pgsql-cecy')->create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('code',100); //codigo
            $table->string('name',200); //nombre
            $table->decimal('cost', 3, 2); //costo
            $table->text('photo'); //foto
          // $table->string('summary',1000); //resumen    //se coloco en planificación
            $table->integer('duration'); //duracion_horas
            $table->foreignId('modality_id')->constrained('catalogues'); //id_modalidad
            $table->boolean('free'); //gratuito
            $table->foreignId('state_id')->constrained('ignug.states'); //id_estado
            $table->string('observation',1000); //observacion_curso
            $table->string('objective',1000); //objetivo
           // $table->json('needs'); //necesidades del curso es un array---Se coloco en planificación
            $table->json('facilities'); //instalaciones  entorno de aprendizaje
            $table->json('theoretical_phase'); //fase teorica entorno de aprendizaje
            $table->json('practical_phase'); //fase practica entorno de aprendizaje
            $table->json('cross_cutting_topics'); //temas trasversales
            $table->json('bibliography'); //bibliografias
            $table->json('teaching_strategies'); //estrategias de enseñansa - aprendizaje
            $table->foreignId('participant_type_id')->constrained('catalogues'); //id_tipo_participante
            $table->foreignId('area_id')->constrained('catalogues'); //id_area
            $table->foreignId('level_id')->constrained('catalogues'); //id_niveles
            $table->string('required_installing_sources',150); //recursos_requeridos_instalacion
            $table->integer('practice_hours'); //horas_practicas
            $table->integer('theory_hours'); //horas_teoricas
            $table->string('practice_required_resources',150); //recursos_requeridos_practica
            $table->string('aimtheory_required_resources',150); //recursos_requeridos_teoricos
            $table->string('learning_teaching_strategy',150); //estrategias_enseñanza_aprendizaje
            // $table->foreignId('person_proposal_id')->constrained('authorities'); //id_persona_propuesta
            $table->date('proposed_date'); //fecha_propuesta
            $table->date('approval_date'); //fecha_aprobacion curso
          //  $table->date('need_date'); //fecha_registro de necesidad
            $table->string('local_proposal',500); //local_propuesta_a_dictar
          //  $table->foreignId('schedules_id')->constrained('schedules'); //id_horario_propuesta
            $table->string('project',150); //proyecto_curso
            $table->integer('capacity'); //capacidad_curso
            // $table->foreignId('classroom_id')->constrained('ignug.classrooms');//id_aula
            $table->foreignId('course_type_id')->constrained('catalogues'); //id_tipo_curso
            $table->foreignId('specialty_id')->constrained('catalogues'); //id_especialidad
            $table->foreignId('academic_period_id')->constrained('catalogues'); //id_periodo_academico
            $table->string('setec_name',200); //nombre_setec
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
        Schema::connection('pgsql-cecy')->dropIfExists('courses');
    }
}
