<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Machine;
use App\Models\Maintance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TechController extends Controller
{
    protected function DeleteMaintance($id){
        $main=Maintance::find($id);
        $main->delete();
        return redirect('home');
    }
    protected function createMaintance(){
        $departements=Departement::all();
        $machines=Machine::all();
        return view  ('createMaintance',['departements'=>$departements,'machines'=>$machines]);
    }
    protected function AjouterMaintance(Request $request){
        $main =new Maintance();
        $main->name_maintance=$request->name_maintance;
        $main->dateDebut=$request->dateDebut;
        $main->dateFin=$request->dateFin;
        $main->TypeMaintence=$request->TypeMaintence;
        $main->departement_id=$request->departement_id;
        $main->user_id=$request->user_id;
        $main->machine_id=$request->machine_id;
        $main->material=$request->material;
        $main->valide=$request->valide;
        $main->save();
        return redirect('home');
    }
    protected function editMaintance($id){
        $main=Maintance::find($id);
         $departements=Departement::all();
         $machines=Machine::all();
        return view('editMaintance',['main'=>$main,'departements'=>$departements,'machines'=>$machines]);
    }
    protected function updateMaintance(Request $request,$id){
        $main =Maintance::find($id);
        $main->name_maintance=$request->name_maintance;
        $main->dateDebut=$request->dateDebut;
        $main->dateFin=$request->dateFin;
        $main->TypeMaintence=$request->TypeMaintence;
        $main->departement_id=$request->departement_id;
        $main->user_id=$request->user_id;
        $main->machine_id=$request->machine_id;
        $main->material=$request->material;
        $main->valide=$request->valide;
        $main->save();
        return redirect('home');
    }
    protected function pdfRapport(){
      $maintances=DB::table('maintances')
      ->select('maintances.id','maintances.name_maintance','maintances.dateDebut','maintances.dateFin','maintances.TypeMaintence',
      'maintances.material','departements.name_d as nameDepartement','machines.serie',
      'machines.name_m as machineName','maintances.valide','maintances.created_at','users.name as username','maintances.valide')
      ->join('departements','departements.id','=','maintances.departement_id')
      ->join('machines','machines.id','=','maintances.machine_id')
      ->join('users','users.id','=','maintances.user_id')
      ->where('maintances.user_id','=',Auth::user()->id)
      ->where('maintances.valide',true)
      ->get();
      return view('PDFrapport',['maintances'=>$maintances]);
    }
}