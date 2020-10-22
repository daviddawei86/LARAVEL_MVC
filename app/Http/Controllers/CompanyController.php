<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Movie;
use App\Company;
use Notification;
use PDF;
use Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CompaniesExport;

class CompanyController extends Controller {
    
    public function excel() {
        return Excel::download(new CompaniesExport, 'companies.xlsx');
    }

    public function pdf() {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html());
        return $pdf->stream();
    }

    public function convert_customer_data_to_html() {
        $compa = Company::all();

        $output = '
     <h3 align="center">Compañias</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="10%">Id</th>
    <th style="border: 1px solid; padding:12px;" width="10%">Fundación</th>
    <th style="border: 1px solid; padding:12px;" width="25%">Nombre compañia</th>
    <th style="border: 1px solid; padding:12px;" width="35%">Presidente</th>
    </tr>
     ';
        foreach ($compa as $compañia) {
            $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">' . $compañia->id . '</td>
       <td style="border: 1px solid; padding:12px;">' . $compañia->fundation . '</td>
       <td style="border: 1px solid; padding:12px;">' . $compañia->companyName . '</td>
       <td style="border: 1px solid; padding:12px;">' . $compañia->president . '</td>
      </tr>
      ';
        }
        $output .= '</table>';
        return $output;
    }

    public function getIndex() {
        $compa = Company::all();
        return view('company.index', array('arrayCompanies' => $compa));
        //return view('catalog.index',array('arrayPeliculas'=>$this->arrayPeliculas));
    }

    public function getShow($id) {

        $compa = Company::findOrFail($id);
        $pelis = Movie::all();
        return view('company.show', array('Company' => $compa), array('arrayPeliculas' => $pelis));
        //return view('company.show', array('Company'=>$this->arrayCompanies[$id],'id'=>$id));
    }

    public function getCreate() {
        return view('company.create');
    }

    public function postCreate(Request $request) {
        $Company = new Company;
        $Company->companyName = $request->input('company_name');
        $Company->fundation = $request->input('foundation');
        $Company->president = $request->input('president');
        $Company->poster = $request->input('poster');
        $Company->save();
        // Notification::success('Success message');
        return redirect('/company');
        //return view('catalog.create');
    }

    public function getEdit($id) {
        $compa = Company::findOrFail($id);
        return view('company.edit', array('Company' => $compa));

        //director=Director::findOrFail($movies->id_director);
        //directors=Director::all();
    }

    public function putEdit(Request $request, $id) {
        $Company = Company::findOrFail($id);
        $Company->companyName = $request->input('companyName');
        $Company->fundation = $request->input('fundation');
        $Company->president = $request->input('president');
        $Company->poster = $request->input('poster');
        $Company->save();
        //  Notification::success('Success message');
        return redirect('/company/show/' . $id);
    }

    public function deleteCompany($id) {
        $Company = Company::findOrFail($id);
        $Company->delete();
        // Notification::success('Success Delete');
        return redirect('/company');
    }

}
