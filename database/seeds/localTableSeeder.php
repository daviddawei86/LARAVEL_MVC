<?php

use Illuminate\Database\Seeder;
use App\Local;

class LocalTableSeeder extends Seeder
{
      /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        self::seedLocal();
        $this->command->info('Tabla local inicializada con datos!');
    }

    private function seedLocal() {
        DB::table('local')->delete();
        foreach ($this->arrayLocals as $local) {
            $p = new Local;
            $p->address = $local['address'];
            $p->telephon = $local['telephon'];
            $p->google_maps = $local['google_maps'];
            $p->save();
        }
    }

    private $arrayLocals = array(
        array(
            'address' => 'Carrer de Plini el Vell, 1',
            'telephon' => '9360000000',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2985.5184868679025!2d2.083280055532818!3d41.55802188173477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49494b00c8ab5%3A0xb176ab75f9fb88c1!2sCarrer+de+Plini+el+Vell%2C+1%2C+08206+Sabadell%2C+Barcelona!5e0!3m2!1sca!2ses!4v1552208588031'
        ),
        array(
            'address' => 'Av. del Pintor Mir, 112',
            'telephon' => '9360000000',
            'google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2984.9102001995593!2d2.0400195150578493!3d41.571188079247754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4933987950e0b%3A0x7714c9ff5ad89c37!2sAv.+del+Pintor+Mir%2C+112%2C+08227+Terrassa%2C+Barcelona!5e0!3m2!1sca!2ses!4v1552209126963'
        )
    );
}
