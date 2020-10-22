<?php

namespace App\Http\Controllers;

use App\Sala;
use App\Local;
use Illuminate\Http\Request;


class SalaController extends Controller {


    public function getShow($id) {

        $sala = Sala::findOrFail($id);

        return view('sala.show', array('Sala' => $sala));
       
        //return view('company.show', array('Company'=>$this->arrayCompanies[$id],'id'=>$id));
    }

    public function getCreate($id) {
        
        $local = Local::findOrFail($id);
        return view('sala.create',array('Local' => $local));
    }

    public function postCreate(Request $request) {
        $Sala = new Sala;
        $Sala->sala_name = $request->input('sala_name');
        $Sala->capacity = $request->input('capacity');
        $Sala->sala_photo = $request->input('sala_photo');
        $Sala->local_id = $request->input('local_id');
        $Sala->save();
        // Notification::success('Success message');
        return redirect('/local');
        //return view('catalog.create');
    }

    public function getEdit($id) {
        $sala = Sala::findOrFail($id);
        return view('sala.edit', array('Sala' => $sala));

        //director=Director::findOrFail($movies->id_director);
        //directors=Director::all();
    }

    public function putEdit(Request $request, $id) {
        $Sala = Sala::findOrFail($id);
        $Sala->sala_name = $request->input('sala_name');
        $Sala->capacity  = $request->input('capacity');
        $Sala->sala_photo = $request->input('sala_photo');
        $Sala->save();
        //  Notification::success('Success message');
        return redirect('/sala/show/' . $id);
    }

    public function deleteSala($id) {
        $Sala = Sala::findOrFail($id);
        $Sala->delete();
        // Notification::success('Success Delete');
        return redirect('/local');
    }

}
