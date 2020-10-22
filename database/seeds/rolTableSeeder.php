<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        self::seedRol();
        $this->command->info('Tabla rol inicializada con datos!');
    }

    private function seedRol() {
        DB::table('rol')->delete();
        foreach ($this->arrayRols as $rol) {
            $p = new Rol;
            $p->name_rol = $rol['name_rol'];
            $p->save();
        }
    }

    private $arrayRols = array(
        array(
            'name_rol' => 'MAESTRO'
        ),
        array(
            'name_rol' => 'PLATINO'        
        )
    );

}
