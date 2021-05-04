<?php

use Illuminate\Database\Seeder;
use App\Models\User;


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           


            $user = new User;
            $user->name = 'Theizer';
            $user->username = 'tgonzalez';
            $user->last_name = 'Gonzalez';
            $user->email = 'tgonzalez@gmail.com';
            $user->password = 'admin';
            $user->status = 1; // (1) active (0)disabled
            $user->save();

            $user->assignRole('Administrador');


            $user = new User;
            $user->name = 'Militza';
            $user->username = 'mvillarroel';
            $user->last_name = 'Villarroel';
            $user->email = 'mpaez@mmmvenezuela.com';
            $user->password = 'admin';
            $user->status = 1; // (1) active (0)disabled
            $user->save();

            $user->assignRole('Usuario');


            DB::table('estados')->insert([
            'nb_status'         => 'activo',
            'nb_secundario'     => 'enable',
            'co_status'         => 'ACT',
            'co_grupo'          => 'GRAL',
            'id_padre'          => null,
            'tx_observaciones'  => '',
            'bo_activo'         => 1,
            'id_usuario'        => 1,

        ]);

        DB::table('estados')->insert([
            'nb_status'         => 'inactivo',
            'nb_secundario'     => 'disable',
            'co_status'         => 'INA',
            'co_grupo'          => 'GRAL',
            'id_padre'          => null,
            'tx_observaciones'  => '',
            'bo_activo'         => 1,
            'id_usuario'        => 1,

        ]);
        DB::table('estados')->insert([
            'nb_status'         => 'pendiente',
            'nb_secundario'     => 'pending',
            'co_status'         => 'PEN',
            'co_grupo'          => 'PRUEBA',
            'id_padre'          => null,
            'tx_observaciones'  => 'Actos pendientes',
            'tx_icono'          => 'mdi-progress-alert',
            'tx_color'          => 'amber',
            'bo_activo'         => 1,
            'id_usuario'        => 1,

        ]);

        DB::table('estados')->insert([
            'nb_status'         => 'asignada',
            'nb_secundario'     => 'assigned',
            'co_status'         => 'ASI',
            'co_grupo'          => 'PRUEBA',
            'id_padre'          => null,
            'tx_observaciones'  => 'Accion asignada',
            'tx_icono'          => 'mdi-text-box-check',
            'tx_color'          => 'info',
            'bo_activo'         => 1,
            'id_usuario'        => 1,

        ]);


        DB::table('tipo_equipos')->insert([
            'nb_nombre'         => 'LAPTOP',
            'estado_id'     => 1
        ]);

        DB::table('tipo_equipos')->insert([
            'nb_nombre'         => 'MONITOR',
            'estado_id'     => 1
        ]);


        DB::table('tipo_equipos')->insert([
            'nb_nombre'         => 'MOUSE',
            'estado_id'     => 1
        ]);

        DB::table('tipo_equipos')->insert([
            'nb_nombre'         => 'IMPRESORA',
            'estado_id'     => 1
        ]);

        DB::table('tipo_equipos')->insert([
            'nb_nombre'         => 'CPU',
            'estado_id'     => 1
        ]);


        DB::table('tipo_equipos')->insert([
            'nb_nombre'         => 'CABLE VGA',
            'estado_id'     => 1
        ]);

    }


}
