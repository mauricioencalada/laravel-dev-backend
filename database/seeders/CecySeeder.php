<?php

namespace Database\Seeders;

use App\Models\Authentication\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;
use App\Models\Cecy\Catalogue;
use App\Models\Cecy\Schedule;
use App\Models\Cecy\Institution;
use App\Models\Cecy\Instructor;
use App\Models\Cecy\Departments;
use App\Models\Ignug\SchoolPeriod;
use App\Models\Cecy\Authorities;
use App\Models\Cecy\Locations;
use App\Models\Cecy\Participant;
use Illuminate\Support\Facades\DB;

class CecySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Catalogue
        Catalogue::factory()->create([
            'code' => 'A',
            'name' => 'ADMINISTRACIÓN Y LEGISLACIÓN',
            'type' => 'areas',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'B',
            'name' => 'AGRONOMÍA',
            'type' => 'areas',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'C',
            'name' => 'ZOOTECNIA',
            'type' => 'areas',
            'state_id' => 1,
        ]);


        // participant_type
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'Adultos',
            'type' => 'participant_type',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'Estudiantes',
            'type' => 'participant_type',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'Profesores',
            'type' => 'participant_type',
            'state_id' => 1,
        ]);

        // modality
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'PRESENCIAL',
            'type' => 'modality',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'DUAL',
            'type' => 'modality',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'VIRTUAL',
            'type' => 'modality',
            'state_id' => 1,
        ]);

        // levels
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'Primero',
            'type' => 'levels',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'Segundo',
            'type' => 'levels',
            'state_id' => 1,
        ]);

        // schedule
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => '13:00 - 15:00',
            'type' => 'schedule',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => '15:00 - 17:00',
            'type' => 'schedule',
            'state_id' => 1,
        ]);

        // course_type
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'Administrativo',
            'type' => 'course_type',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'Técnico',
            'type' => 'course_type',
            'state_id' => 1,
        ]);

        // academic_period
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'PRIMERO',
            'type' => 'academic_period',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'SEGUNDO',
            'type' => 'academic_period',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'TERCERO',
            'type' => 'academic_period',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'CUARTO',
            'type' => 'academic_period',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'QUINTO',
            'type' => 'academic_period',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'SEXTO',
            'type' => 'academic_period',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'SEPTIMO',
            'type' => 'academic_period',
            'state_id' => 1,
        ]);

        // ethnic_origin
        Catalogue::factory()->create([
            'code' => '1',
            'name' => 'INDIGENA',
            'type' => 'ethnic_origin',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => '2',
            'name' => 'AFROECUATORIANO',
            'type' => 'ethnic_origin',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => '3',
            'name' => 'NEGRO',
            'type' => 'ethnic_origin',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => '4',
            'name' => 'MULATO',
            'type' => 'ethnic_origin',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => '5',
            'name' => 'MONTUBIO',
            'type' => 'ethnic_origin',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => '6',
            'name' => 'MESTIZO',
            'type' => 'ethnic_origin',
            'state_id' => 1,
        ]);

            //display
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'Lunes',
            'type' => 'Dias',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'Martes',
            'type' => 'Dias',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'Miercoles',
            'type' => 'Dias',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'Jueves',
            'type' => 'Dias',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'Viernes',
            'type' => 'Dias',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'Sábado',
            'type' => 'Dias',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'pruebas',
            'name' => 'Domingo',
            'type' => 'Dias',
            'state_id' => 1,
        ]);
        //Authorities
         Catalogue::factory()->create([
            'code' => 'Authorities',
            'name' => 'suspendido',
            'type' => 'Status',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'Authorities',
            'name' => 'retirado',
            'type' => 'Status',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'Authorities',
            'name' => 'especialista en Cecy',
            'type' => 'position',
            'state_id' => 1,
        ]);
        Catalogue::factory()->create([
            'code' => 'Authorities',
            'name' => 'responsable del Cecy',
            'type' => 'position',
            'state_id' => 1,
        ]);
        
        Catalogue::factory()->create([
            'code' => 'Authorities',
            'name' => 'Logistica',
            'type' => 'position',
            'state_id' => 1,
        ]);
        

        // Instructors
        User::factory()->create()->each(function ($user) {
            $user->participant()->save(Instructor::factory()->make());
            $user->roles()->attach(3);
        });




        //horarios
        Schedule::factory()->create([
            'state_id' => 1,
            'start_time' => '14:00',
            'end_time' => '16:00',
            'day_id' => 29,
        ]);
        Schedule::factory()->create([
            'state_id' => 1,
            'start_time' => '14:00',
            'end_time' => '16:00',
            'day_id' => 29,
        ]);

       
  
   //Authorities
   Authorities::factory()->create([
    'state_id' => 1,
    'user_id' => 1,
    'status_id' => 36,//36,37
    'position_id' => 38,//38,39/40
    'start_position' => '2020-08-28',
    'end_position' => '2020-10-28',
]);

  Locations::factory()->create([
    'name' => 'location 1',
    'state_id' => 1,
]);

  

        
       

        


        //participantes
        Participant::factory()->create([
            'user_id' => 1, 
            'person_type_id' => 4, //4,5,6
            'state_id' => 1,
        ]);
    

          //institucion
          Institution::factory()->create([
            'state_id' => 1,
            'ruc'=>'1234567890',
            'logo' => 'logo',
            'name' => 'Yavirac',
            'slogan' => 'Fortaleciendo Capacidades ',
            'code' => "test",
            'authorities_id'=>1
        ]);

       
       


    }

}
