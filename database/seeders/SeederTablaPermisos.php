<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//agregamos el modelo de permisos de spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operaciones sobre tabla usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

            //Operaciones sobre tabla estado citas
            'ver-estado-cita',
            'crear-estado-cita',
            'editar-estado-cita',
            'borrar-estado-cita',

            //Operaciones sobre tabla citas
            'ver-cita',
            'crear-cita',
            'editar-cita',
            'borrar-cita',

            //Operaciones sobre tabla pacientes
            'ver-paciente',
            'crear-paciente',
            'editar-paciente',
            'borrar-paciente',

            //Operaciones sobre tabla medicos
            'ver-doctor',
            'crear-doctor',
            'editar-doctor',
            'borrar-doctor',

            //Operaciones sobre tabla notificacion doctor
            'ver-notificacion-doctor',
            'crear-notificacion-doctor',
            'editar-notificacion-doctor',
            'borrar-notificacion-doctor',

                        
            //Operaciones sobre tabla examenes
            'ver-examen',
            'crear-examen',
            'editar-examen',
            'borrar-examen',

            //Operaciones sobre tabla expedientes
            'ver-expediente',
            'crear-expediente',
            'editar-expediente',
            'borrar-expediente',

            //Operaciones sobre tabla antecedentes
            'ver-antecedente',
            'crear-antecedente',
            'editar-antecedente',
            'borrar-antecedente',

            //Operaciones sobre tabla especialidades
            'ver-especialidad',
            'crear-especialidad',
            'editar-especialidad',
            'borrar-especialidad',

            //Operaciones sobre tabla enfermedades
            'ver-enfermedad',
            'crear-enfermedad',
            'editar-enfermedad',
            'borrar-enfermedad',

            //Operaciones sobre tabla grupo de enfermedades
            'ver-grupo-enfermedad',
            'crear-grupo-enfermedad',
            'editar-grupo-enfermedad',
            'borrar-grupo-enfermedad',

            //Operaciones sobre tabla medicamentos
            'ver-medicamento',
            'crear-medicamento',
            'editar-medicamento',
            'borrar-medicamento',

            //Operaciones sobre tabla horarios
            'ver-horario',
            'crear-horario',
            'editar-horario',
            'borrar-horario',

            //Operaciones sobre tabla tipo de examen
            'ver-tipo-examen',
            'crear-tipo-examen',
            'editar-tipo-examen',
            'borrar-tipo-examen',

            //Operaciones sobre tabla  de medical consultation 
            'ver-consulta-medica',
            'crear-consulta-medica',
            'editar-consulta-medica',
            'borrar-consulta-medica',
            
            //Operaciones sobre tabla consultas medicas medicina
            'ver-consulta-medica-medicina',
            'crear-consulta-medica-medicina',
            'editar-consulta-medica-medicina',
            'borrar-consulta-medica-medicina',
            
             //operaciones para elmenu
             'ver-dashboard',
             'ver-agenda',
             'ver-gestion',
             'ver-administracion'

        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
