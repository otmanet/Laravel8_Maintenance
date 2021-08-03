<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Machine;
use App\Models\Maintance;
use App\Models\User;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    protected function index(){
        $departement=Departement::all();
        return view('departement',['departement'=>$departement]);
    }
    protected function AddDepartement(Request $request){
          $departement=new Departement();
          $departement->name_d=$request->name_d;
          $departement->save();
          return redirect('/Admin/Departement');
    }
    protected function DeleteDepartement($id){
        $departement=Departement::find($id);
        $departement->delete();
        return redirect('/Admin/Departement');
    }
    protected function EditDepartement($id){
        $departement=Departement::find($id);
        return view('editDepartement',['dep'=>$departement]);
    }
    protected function UpdateDepartement(Request $request,$id){
        $departement=Departement::find($id);
        $departement->name_d=$request->name_d;
        $departement->save();
        return redirect('/Admin/Departement');
    }
    protected function Machine(){
        $departement=Departement::all();
        return view('Createmachine',['departements'=>$departement]);
    }
    protected function getMachine(){
        $machine=DB::table('machines')
        ->select('machines.id','machines.name_m','machines.serie','machines.created_at','departements.name_d as nameDepartement')
        ->join('departements','machines.departement_id','=','departements.id')
        // ->where('recipes.deleted_at',null)
        ->get();

        return view('machine',['machines'=>$machine]);
    }
    protected function AjouterMachine(Request $request){
          $machine=new Machine();
          $machine->name_m=$request->name_m;
          $machine->serie=$request->serie;
          $machine->departement_id=$request->departement_id;
          $machine->save();
          return redirect('/Admin/Machine');
    }
    protected function DeleteMachine($id){
        $machine=Machine::find($id);
        $machine->delete();
        return redirect('/Admin/Machine');
    }
    protected function EditMachine($id){
        $machine=Machine::find($id);
        $departement=Departement::all();
        return view('Editmachine',['mach'=>$machine,'departements'=>$departement]);
    }
    protected function UpdateMachine(Request $request,$id){
        $machine=Machine::find($id);
        $machine->name_m=$request->name_m;
        $machine->serie=$request->serie;
        $machine->departement_id=$request->departement_id;
        $machine->save();
        return redirect('/Admin/Machine');
    }
    protected function maintancesNonValid(){
         $maintances=DB::table('maintances')
         ->select('maintances.id','maintances.name_maintance','maintances.dateDebut','maintances.dateFin','maintances.TypeMaintence',
         'maintances.material','departements.name_d as nameDepartement','machines.serie',
         'machines.name_m as machineName','maintances.valide','maintances.created_at','users.name as username')
         ->join('departements','departements.id','=','maintances.departement_id')
         ->join('machines','machines.id','=','maintances.machine_id')
         ->join('users','users.id','=','maintances.user_id')
         ->where('maintances.valide',false)
         ->get();
         // return response()->json(['maintance'=>$maintances]);
         return view ('maintancesNonValide',['maintances'=>$maintances]);
    }
    protected function maintancesValid(){
        $maintances=DB::table('maintances')
    ->select(
        'maintances.id',
        'maintances.name_maintance',
        'maintances.dateDebut',
        'maintances.dateFin',
        'maintances.TypeMaintence',
        'maintances.material',
        'departements.name_d as nameDepartement',
        'machines.serie',
        'machines.name_m as machineName',
        'maintances.valide',
        'maintances.created_at',
        'users.name as username'
    )
    ->join('departements', 'departements.id', '=', 'maintances.departement_id')
    ->join('machines', 'machines.id', '=', 'maintances.machine_id')
    ->join('users', 'users.id', '=', 'maintances.user_id')
    ->where('maintances.valide', true)
    ->get();
        // return response()->json(['maintance'=>$maintances]);
        return view('maintancesNonValide', ['maintances'=>$maintances]);
    }
    protected function PDFmaintance($id){
        // $main=Maintance::find($id);
        // $machine=$main->Machine()->get();
        // $departement=$main->departement()->get();
        // $users=$main->user()->get();
          $main=DB::table('maintances')
          ->select(
          'maintances.id',
          'maintances.name_maintance',
          'maintances.dateDebut',
          'maintances.dateFin',
          'maintances.TypeMaintence',
          'maintances.material',
          'departements.name_d',
          'machines.serie',
          'machines.name_m',
          'maintances.valide',
          'maintances.created_at',
          'users.name'
          )
          ->join('departements', 'departements.id', '=', 'maintances.departement_id')
          ->join('machines', 'machines.id', '=', 'maintances.machine_id')
          ->join('users', 'users.id', '=', 'maintances.user_id')
          ->where('maintances.id','=', $id)
          ->first();
         $pdf =PDF::loadView('indexPDF',['main'=>$main]);
         return $pdf->download('Maintance.pdf');
    }
    protected function ValideMaintance($id){
        $maintances=Maintance::find($id);
        $maintances->valide=true;
        $maintances->save();
        return redirect('/home');
    }
    protected function NonValideMaintance($id){
        $maintances=Maintance::find($id);
        $maintances->valide=false;
        $maintances->save();
        return redirect('/home');
    }
    protected function getUsers(){
        $users=DB::table('users')
        ->select('id','name','email','is_admin')
        ->where('users.is_admin',false)
        ->get();
       return view('users',['users'=>$users]);
    }
    protected function deleteUsers($id){
        $user=User::where('id',$id)->first();
        $user->delete();
        return redirect('users');
    }
    public function updateUsers($id){
        $user=User::find($id);
        $user->is_admin=true;
        $user->save();
        return redirect('users');
    }
}