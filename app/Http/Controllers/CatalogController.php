<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Movie;
use App\Company;
use Notification;
use PDF;
use Alert;
use Auth;
use App\User;
use App\Rol;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MoviesExport;

class CatalogController extends Controller {
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
 
  
    
       public function mySearch(Request $request)
    {
    	if($request->has('search')){
    		$movies = Movie::search($request->get('search'))->get();	
    	}else{
    		$movies = Movie::get();
    	}

       
    	return view('/catalog/mySearch', compact('movies'));

    }

    public function excel() {
        return Excel::download(new MoviesExport, 'movies.xlsx');
    }

    public function pdf() {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html());
        return $pdf->stream();
    }

    public function convert_customer_data_to_html() {
        $pelis = Movie::all();

        $output = '
     <h3 align="center">Catálogo</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="10%">Título</th>
    <th style="border: 1px solid; padding:12px;" width="10%">Año</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Director</th>
    <th style="border: 1px solid; padding:12px;" width="5%">Alquilado</th>
    <th style="border: 1px solid; padding:12px;" width="60%">Synopsis</th>
    </tr>
     ';
        foreach ($pelis as $pelicula) {
            $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">' . $pelicula->title . '</td>
       <td style="border: 1px solid; padding:12px;">' . $pelicula->year . '</td>
       <td style="border: 1px solid; padding:12px;">' . $pelicula->director . '</td>
       <td style="border: 1px solid; padding:12px;">' . $pelicula->rented . '</td>
       <td style="border: 1px solid; padding:12px;">' . $pelicula->synopsis . '</td>
      </tr>
      ';
        }
        $output .= '</table>';
        return $output;
    }

    public function getIndex() {

        $pelis = Movie::all();
        return view('catalog.index', array('arrayPeliculas' => $pelis));
        //return view('catalog.index',array('arrayPeliculas'=>$this->arrayPeliculas));
    }

    public function getShow($id) {
        $Pelicula = Movie::findOrFail($id);
        $Company = Company::findOrFail($Pelicula->company_id);

        $user = User::findOrFail(Auth::id());//()->attach(1);//->where('id',10);
        $list = $user->movies->where('id',$id);
        $rol = $user->rols->where('id',1);

        return view('catalog.show', compact('Pelicula','Company','list','rol'));


        //$list = App\Post::find(1)->comments()->where('title', 'foo')->first();
        //return view('catalog.show', array('Pelicula' => $pelis), array('Company' => $company));
        //return view('catalog.show', array('Pelicula'=>$this->arrayPeliculas[$id],'id'=>$id));
    }

    public function getCreate() {
        $company = Company::all();
        return view('catalog.create', array('Company' => $company));
    }

    public function getEdit($id) {
        $pelis = Movie::findOrFail($id);
        $company = Company::all();
        return view('catalog.edit', array('Pelicula' => $pelis), array('Company' => $company));
    }

    public function getLogin() {
        return view('auth.login');
    }

    public function postCreate(Request $request) {
        $Movie = new Movie;
        $Movie->title = $request->input('title');
        $Movie->year = $request->input('year');
        $Movie->director = $request->input('director');
        $Movie->poster = $request->input('poster');
        $Movie->synopsis = $request->input('synopsis');
        $Movie->synopsis = $request->input('synopsis');
        $Movie->minAge = $request->input('minAge');
        $Movie->company_id = $request->input('company_id');
        $Movie->rented_times = 0;
        $Movie->save();
        //Notification::success('Success message');
        alert()->success('Success Message', 'Optional Title');
        return redirect('/catalog');
        //return view('catalog.create');
    }

    public function putEdit(Request $request, $id) {
        $Movie = Movie::findOrFail($id);
        $Movie->title = $request->input('title');
        $Movie->year = $request->input('year');
        $Movie->director = $request->input('director');
        $Movie->poster = $request->input('poster');
        $Movie->synopsis = $request->input('synopsis');
        $Movie->minAge = $request->input('minAge');
        $Movie->company_id = $request->input('company_id');
        $Movie->save();
        Notification::success('Success message');
        return redirect('/catalog/show/' . $id);
    }

    public function putRent($id) {
        //$Movie = Movie::findOrFail($id);
        //$Movie->rented = 1;
        //$Movie->save();

        $user = User::findOrFail(Auth::id());
        $list = $user->movies()->attach($id);

        Notification::success('Success Rent');
        return redirect('/catalog/show/' . $id);
    }

    public function putReturn($id) {
        //$Movie = Movie::findOrFail($id);
        //$Movie->rented = 0;
        //$Movie->save();

        $user = User::findOrFail(Auth::id());
        $list = $user->movies()->detach($id);

        Notification::success('Success Retrun');
        return redirect('/catalog/show/' . $id);
    }

    public function deleteMovie($id) {
        $Movie = Movie::findOrFail($id);
        $Movie->delete();
        Notification::success('Success Delete');
        return redirect('/catalog');
    }

}
