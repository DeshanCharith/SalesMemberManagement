<?php

namespace App\Http\Controllers;

use App\Models\Salesteam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalesteamController extends Controller
{
    public function createTeam(Request $request) {
       
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string',
            'telephone' => 'required|string',
            'joined_date' => 'required|string',
            'current_routes' => 'required|string',
            'comment' => 'required|string',
          
        ]);

        if($validation->fails()) {
            return back()->with('error', 'Something went wrong!');
        } 
        
        else {
        
            // $date=date_create($request->joined_date);
            // echo date_format($date,"m-d-Y H:i:s");

            Salesteam::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' =>$request->telephone,
            'joined_date' => $request->joined_date,
            'current_routes' => $request->current_routes,
            'comment' =>$request->comment
            ]);
        }

       return redirect(route('team.all'))->with('status', 'Member created successfully!');

    }

    public function getTeam(){
        $teams = Salesteam::paginate(5);
        return view('Teamview', compact('teams'));
    }

    public function editTeam($Id) {
        $team = Salesteam::findOrFail($Id);
        return view('Teamedit', compact('team'));
    }

    public function updateTeam($Id, Request $request) {

        Salesteam::where('id',$Id)->update([
            'id' =>$Id,
            'name' => $request->name,
            'email' => $request->email,
            'telephone' =>$request->telephone,
            'joined_date' => $request->joined_date,
            'current_routes' => $request->current_routes,
            'comment' =>$request->comment
        ]);

        return redirect(route('team.all'))->with('status', 'Member updated!');
    }

    public function deleteTeam($Id) {
        Salesteam::findOrFail($Id)->delete();
        return redirect(route('team.all'))->with('status', 'Member deleted!');


    }
    

}
