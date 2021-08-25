<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $user = User::create([
            'name'=> $fields['name'],
            'gender' => $fields['gender'],
            'address' => $fields['address'],
            'phone' => $fields['phone'],
            'ward_id' => $fields['ward_id']
        ]);
       
        // $response = [
        //     'user' => $user,
        //     'message' => 'User is succesfully created'
        // ];
        return $request->redirect('dashboard');
    }
    public function register(){
        return view('register');
    }
    public function index()
    {
        $country = Citizen::get()->count();
        if(!$country ){
            return view('dashboard',[]);
        }
        $states = State::get();
        $lgas = LGA::get();
        $wards = Ward::get();
        $countPerState;
         $stateLga;
         $$lgaWards;

        foreach($states as $st){
           $stateLga[$st] = $st->lgas();
           foreach($stateLga[$st] as $lga){
            $lgaWards[$lga] = $lga->wards();
            foreach($lgaWards[$lga] as $ward){
                $countPerState[$st] = $countPerLGA[$lga] ? 
                ($ward->citizens()->count() + $countPerLGA[$lga]) : 0;
            }
           }
           
        }
         $countPerLGA;
        $lgaWards[$lga];
        foreach($lgas as $lga){
            $lgaWards[$lga] = $lga->wards();
            foreach($lgaWards[$lga] as $ward){
                $countPerLGA[$lga] = $countPerLGA[$lga] ? 
                ($ward->citizens()->count() + $countPerLGA[$lga]) : 0;
            }
        }
        $countPerWard;
        foreach($wards as $ward){
            $countPerWard[$ward] = $ward->citizens()->count();
        }
        $response = [
            'country' => $country,
            'lgas' =>$countPerLGA,
            'wards' =>$countPerWards,
            'states' => $countPerState
        ];
        return view('dashboard',$response);
    }
}
