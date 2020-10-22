<?php

use Illuminate\Database\Seeder;
use App\Subscription;

class SubscriptionTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        self::seedSubscription(); 
        $this->command->info('Tabla subscription inicializada con datos!');
    }

    private function seedSubscription() {
        DB::table('subscription')->delete();
        foreach ($this->arraySubs as $sub) {
            $p = new Subscription;
            $p->subscriptionName = $sub['subscriptionName'];
            $p->description = $sub['description'];         
            $p->save();
        }
    }

    private $arraySubs = array(
        array(
            'subscriptionName' => 'Gold',          
            'description' => '1 año suscrito'
        ),
        array(
            'subscriptionName' => 'Platino',         
            'description' => '2 años suscrito'
        )
    );

}
