<?php

namespace App\Http\Controllers;

use App\Models\Salesteam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalesteamController extends Controller
{

//Create team member
public function createTeam(Request $request) {
       
        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:salesteams,email',
            // 'telephone' => 'required|unique:salesteams,telephone|numeric|min:8|max:11',
            'telephone' => 'required|unique:salesteams,telephone|numeric|digits:9',
            'joined_date' => 'required|string',
            'current_routes' => 'required|string',
            'comment' => 'required|string',
          
        ]);

        if($validation->fails()) {
            return back()->with('error', $validation->errors());
        } 
        
        else {
        
            $date=date_create($request->joined_date);
            $date= date_format($date,"m-d-Y");

            Salesteam::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' =>$request->telephone,
            'joined_date' => $date,
            'current_routes' => $request->current_routes,
            'comment' =>$request->comment
            ]);
        }

       return redirect(route('team.all'))->with('status', 'Member created successfully!');

}

//Get all records of team member
public function getTeam(){
        $teams = Salesteam::paginate(5);
        return view('Teamview', compact('teams'));
}

//Navigate to team edit page with deatils of editable
public function editTeam($Id) {
        $team = Salesteam::findOrFail($Id);
        return view('Teamedit', compact('team'));
}

//Update team member details
public function updateTeam($Id, Request $request) {

        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:salesteams,email,'.$Id,
            // 'telephone' => 'required|numeric|min:8|max:12|unique:salesteams,telephone,'.$Id,
            'telephone' => 'required|numeric|digits:9|unique:salesteams,telephone,'.$Id,
            'joined_date' => 'required|string',
            'current_routes' => 'required|string',
            'comment' => 'required|string',
          
        ]);

        if($validation->fails()) {
            // print_r($validation1->errors());
            // die("jhh");
            return back()->with('error', $validation->errors());
        } 

        else {

            $date=date_create($request->joined_date);
            $date= date_format($date,"m-d-Y");

        Salesteam::where('id',$Id)->update([
            'id' =>$Id,
            'name' => $request->name,
            'email' => $request->email,
            'telephone' =>$request->telephone,
            'joined_date' => $date,
            'current_routes' => $request->current_routes,
            'comment' =>$request->comment
        ]);
        }
        return redirect(route('team.all'))->with('status', 'Member updated!');
}

//Delete team member
public function deleteTeam($Id) {
        Salesteam::findOrFail($Id)->delete();
        return redirect(route('team.all'))->with('status', 'Member deleted!');


}
    

}
