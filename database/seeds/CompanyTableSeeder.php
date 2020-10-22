<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompanyTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        self::seedCompany();
        $this->command->info('Tabla company inicializada con datos!');
    }

    private function seedCompany() {
        DB::table('company')->delete();
        foreach ($this->arrayCompanies as $company) {
            $p = new Company;
            $p->fundation = $company['fundation'];
            $p->president = $company['president'];
            $p->poster = $company['poster'];
            $p->companyName = $company['companyName'];
            $p->save();
        }
    }

    private $arrayCompanies = array(
        array(//1
            'fundation' => '1980',
            'president' => 'John Mayers',
            'companyName' => 'Touchstone',
            'poster' => 'https://yt3.ggpht.com/a-/AAuE7mAlQCvk77woO122xibgaJuegVXMSYUCoaLSJg=s900-mo-c-c0xffffffff-rj-k-no'
        ),
        array(//2
            'fundation' => '1912',
            'president' => 'Jim Gianopulos',
            'companyName' => 'Paramount Pictures',
            'poster' => 'https://upload.wikimedia.org/wikipedia/commons/7/77/Paramount_logo_1914.jpg'
        ),
        array(//3
            'fundation' => '1935',
            'president' => 'Joseph M. Schenck',
            'companyName' => 'Twentieth Century Fox Film Corporation',
            //'poster' => 'https://upload.wikimedia.org/wikipedia/en/thumb/f/f9/20th_Century_Fox_logo.svg/1200px-20th_Century_Fox_logo.svg.png'
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/thumb/f/f9/20th_Century_Fox_logo.svg/1200px-20th_Century_Fox_logo.svg.png'
        
        ),
        array(//4
            'fundation' => '1912',
            'president' => 'Carl Laemmle',
            'companyName' => 'Universal Studios',
            'poster' => 'https://upload.wikimedia.org/wikipedia/en/thumb/a/a1/Universal_Studios.svg/1200px-Universal_Studios.svg.png'
        ),
        array(//5
            'fundation' => '1979',
            'president' => 'Bob Weinstein',
            'companyName' => 'MariMax',
            'poster' => 'https://vignette.wikia.nocookie.net/create-logopedia/images/a/ad/Marimax_Films.png/revision/latest?cb=20160207165931'
        ),
        array(//6
            'fundation' => '1923',
            'president' => 'Albert Warner',
            'companyName' => 'Warner Bros',
            'poster' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Warner_Bros._Pictures_logo.svg/569px-Warner_Bros._Pictures_logo.svg.png'
        ),
        array(//7
            'fundation' => '1967',
            'president' => 'Robert Shaye',
            'companyName' => 'New Line Film Productions Inc',
            'poster' => 'http://3.bp.blogspot.com/-7Q98dItqm04/VNyV_uDOoJI/AAAAAAAAE_g/vO2H5nNKdUo/s1600/500px-New_Line_Cinema.svg-761491.png'
        ),
        array(//8
            'fundation' => '1999',
            'president' => 'William J. Bernstein',
            'companyName' => 'Orion Pictures Corporation',
            'poster' => 'https://vignette.wikia.nocookie.net/logopedia/images/4/41/Orion_Pictures_logo_%282018%29.png/revision/latest/scale-to-width-down/2000?cb=20181113135934'
        ),
        array(//9
            'fundation' => '1919',
            'president' => 'William J. Bernstein',
            'companyName' => 'Columbia Pictures',
            'poster' => 'https://vignette.wikia.nocookie.net/scratchpad/images/d/d6/Columbia_Pictures.jpg/revision/latest?cb=20180123192139'
        )

    );

}
