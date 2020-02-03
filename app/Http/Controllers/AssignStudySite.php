<?php

namespace App\Http\Controllers;

use App\Site;
use App\Study;
use App\User;

use Illuminate\Http\Request;


class AssignStudySite extends Controller
{
    
   public function ShowAssign($user)
   {
        $user = User::find($user);
        $sites = Site::all();
        $studies = Study::all();
        return view('admin.assign')->with(compact('user', 'sites', 'studies'));
   }


   public function Assign($user, Request $request)
   {
      $user = User::find($user);
      $this->AssignSite($user, $request['sites']); 
      $this->AssignStudy($user, $request['studies']);
      return redirect()->route('users')->with('success', 'User Assigned to Sites/Studies.');
   }

    public function AssignSite(User $user, $sites)
   {  
      $user->sites()->sync($sites); 
   }

   public function AssignStudy(User $user, $studies)
   {
      $user->studies()->sync($studies);
   }
   

}
