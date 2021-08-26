<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Citizen;
use App\Models\State;
use App\Models\Ward;
use App\Models\LGA;

class CitizenController extends Controller
{
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'gender' => 'required|string',
            'address' => 'required|string|min:5',
            'phone' => 'required|string|min:10|max:14'
        ]);
        $user = Citizen::create([
            'name'=> $fields['name'],
            'gender' => $fields['gender'],
            'address' => $fields['address'],
            'phone' => $fields['phone'],
            'ward_id' => $request->input('ward'),
            'user_id' => auth()->user()->id
        ]);
       
        // $response = [
        //     'user' => $user,
        //     'message' => 'User is succesfully created'
        // ];
        return redirect('/dashboard');
    }
    public function register(){
        $states = State::all();
        $newStates = [];
        foreach($states as $state){
            $newStates[$state->id] = ['state'=>$state, 'lgas' => $state->l_g_a_s()];
        }
    //     foreach($newStates as $stateId => $stateArr)
    //      foreach($stateArr['lgas']->get() as $lga)
    //         echo $lga;
       
    //    dd($newStates);
        return view('register', ['states'=> $newStates]);
    }
    public function index()
    {
        $country = Citizen::all()->count();
        if(!$country ){
            return view('dashboard',[]);
        }
        $states = State::all();
        
        $lgas = LGA::all();
        $wards = Ward::all();
        $countPerState = [];
         $stateLga;
         $lgaWards;
         $countPerLGA;

        foreach($states as $st){
           $stateLga[$st->name] = $st->l_g_a_s();
           foreach($stateLga[$st->name]->get() as $lga){
            $lgaWards[$lga->name] = $lga->wards();
            foreach($lgaWards[$lga->name]->get() as $ward){
                $countPerState[$st->name] = isset($countPerState[$st->name]) ? 
                ($ward->citizens()->count() + $countPerState[$st->name]) : 0;
            }
           }
           
        }
         $countPerLGA =[];
        
        foreach($lgas as $lga){
            $lgaWards[$lga->name] = $lga->wards() ;
            //This will only show lgas that have registered wards
            foreach($lgaWards[$lga->name]->get() as $ward){
                $countPerLGA[$lga->name] = isset($countPerLGA[$lga->name]) ? 
                ($ward->citizens()->count() + $countPerLGA[$lga->name]) : 0;
            }
        }
        $countPerWard = [];
        foreach($wards as $ward){
            $countPerWard[$ward->name] = $ward->citizens()->count();
        }
        $response = [
            'country' => $country,
            'lgas' =>$countPerLGA,
            'wards' =>$countPerWard,
            'states' => $countPerState
        ];
       
        return view('dashboard',$response);
    }
}
