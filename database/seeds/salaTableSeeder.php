<?php

use Illuminate\Database\Seeder;
use App\Sala;

class SalaTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        self::seedSala();
        $this->command->info('Tabla sala inicializada con datos!');   
    }

    private function seedSala() {
        DB::table('sala')->delete();
        foreach ($this->arraySalas as $sala) {
            $p = new Sala;
            $p->capacity = $sala['capacity'];
            $p->sala_name = $sala['sala_name'];
            $p->sala_photo = $sala['sala_photo'];
            $p->local_id = $sala['local_id'];
            $p->save();
        }
    }

    private $arraySalas = array(
        array(
            'capacity' => '5',
            'sala_name' => 'Carrie Fisher',
            'sala_photo' => 'https://starwarsblog.starwars.com/wp-content/uploads/2016/12/unnamed-3-960x864.jpg',
            'local_id' => 1
        ),
        array(
            'capacity' => '3',
            'sala_name' => 'Harrison Ford',
            'sala_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-Y3n7NCYw6GQxHAxVt9rYQpF34DSkxy9okcNOmWs7-45PdYkTuQ',
            'local_id' => 1
        ),
        array(
            'capacity' => '10',
            'sala_name' => 'Mark Hamill',
            'sala_photo' => 'https://s.hdnux.com/photos/15/27/70/3505694/7/920x920.jpg',
            'local_id' => 2
        )
    );

}
