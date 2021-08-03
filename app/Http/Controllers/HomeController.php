<?php

namespace App\Http\Controllers;

use App\Models\Maintance;
use App\Models\Maintence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->is_admin){
         $maintances=DB::table('maintances')
         ->select('maintances.id','maintances.name_maintance','maintances.dateDebut','maintances.dateFin','maintances.TypeMaintence',
         'maintances.material','departements.name_d as nameDepartement','machines.serie',
         'machines.name_m as machineName','maintances.valide','maintances.created_at','users.name as username','maintances.valide')
         ->join('departements','departements.id','=','maintances.departement_id')
         ->join('machines','machines.id','=','maintances.machine_id')
         ->join('users','users.id','=','maintances.user_id')
         ->get();
        //   return response()->json(['maintance'=>$maintances]);
        return view ('dashboard',['maintances'=>$maintances]);
        }else{
             $maintances=DB::table('maintances')
             ->select('maintances.id','maintances.name_maintance','maintances.dateDebut','maintances.dateFin','maintances.TypeMaintence',
             'maintances.material','departements.name_d as nameDepartement','machines.serie',
             'machines.name_m as machineName','maintances.valide','maintances.created_at','users.name as username','maintances.valide')
             ->join('departements','departements.id','=','maintances.departement_id')
             ->join('machines','machines.id','=','maintances.machine_id')
             ->join('users','users.id','=','maintances.user_id')
             ->where('maintances.user_id','=',Auth::user()->id)
             ->get();
             return view('maintanceUser',['maintances'=>$maintances]);
        }

    }
}