<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Movie;
use App\Local;
use Notification;
use PDF;
use Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LocalsExport;

class LocalController extends Controller {

    public function excel() {
        return Excel::download(new LocalsExport, 'Locals.xlsx');
    }

    public function pdf() {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html());
        return $pdf->stream();
    }

    public function convert_customer_data_to_html() {
        $local = Local::all();

        $output = '
     <h3 align="center">Local</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="10%">Id</th>
    <th style="border: 1px solid; padding:12px;" width="10%">Dirección</th>
    <th style="border: 1px solid; padding:12px;" width="25%">Teléfono</th>
    <th style="border: 1px solid; padding:12px;" width="35%">Map</th>
    </tr>
     ';
        foreach ($local as $locals) {
            $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">' . $locals->id . '</td>
       <td style="border: 1px solid; padding:12px;">' . $locals->address . '</td>
       <td style="border: 1px solid; padding:12px;">' . $locals->telephon . '</td>
       <td style="border: 1px solid; padding:12px;">' . $locals->google_maps . '</td>
      </tr>
      ';
        }
        $output .= '</table>';
        return $output;
    }

    public function getIndex() {
        $local = Local::all();
        return view('local.index', array('arrayLocals' => $local));
        //return view('catalog.index',array('arrayPeliculas'=>$this->arrayPeliculas));
    }

    public function getShow($id) {
        $local = Local::findOrFail($id);
        $list = $local->salas;

        return view('local.show', compact('list'), array('Local' => $local));
    }

    public function getMovies($id = null) {
        $local = Local::findOrFail($id);
        $list = $local->movies;

        return view('local.movies', compact('list'));
    }

    public function getCreate() {
        $pelis = Movie::all();
        return view('local.create', array('arrayPeliculas' => $pelis));
    }

    public function postCreate(Request $request) {
        $Local = new Local;
        $Local->address = $request->input('address');
        $Local->telephon = $request->input('telephon');
        $Local->google_maps = $request->input('google_maps');
        $Local->save();

        //$nuevoLocal = Local::all();
        //$nuevoLocal[count($nuevoLocal)-1]->id;
        // Notification::success('Success message');
        return redirect('/local');
        //return view('catalog.create');
    }

    public function getEdit($id) {
        $local = Local::findOrFail($id);
        return view('local.edit', array('Local' => $local));

        //director=Director::findOrFail($movies->id_director);
        //directors=Director::all();
    }

    public function putEdit(Request $request, $id) {
        $Local = Local::findOrFail($id);
        $Local->address = $request->input('address');
        $Local->telephon = $request->input('telephon');
        $Local->google_maps = $request->input('google_maps');
        $Local->save();
        //  Notification::success('Success message');
        return redirect('/local/show/' . $id);
    }

    public function deleteLocal($id) {
        $Local = Local::findOrFail($id);
        $Local->delete();
        // Notification::success('Success Delete');
        return redirect('/local');
    }

}
