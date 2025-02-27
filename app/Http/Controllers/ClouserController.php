<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clouser;
use App\Models\User; 
use Carbon\Carbon;
use DB;

class ClouserController extends Controller
{
    public function store(Request $request)
{
    // Validate incoming data
    $validatedData = $request->validate([
        'clouserID' => ['required', 'string', 'unique:clousers,clouser_ID'],
        'serviceID' => ['required', 'string', 'exists:users,service_id'],
        'category' => 'required|string',
        'clouserType' => 'required|string',
        'amount' => 'required|numeric',
        'location' => 'required|string',
        'date' => 'required|date',
        'message' => 'nullable|string',
        // 'nooflocation' => 'nullable|numeric',
        // 'connectiontype'=> 'nullable|string'

    ]);


    // dd ($validatedData);

    // Create a new Clouser instance
    $clouser = new Clouser();
    $clouser->clouser_ID = $validatedData['clouserID'];
    $clouser->service_id = $validatedData['serviceID'];
    $clouser->category = $validatedData['category'];
    $clouser->clouser_type = $validatedData['clouserType'];
    $clouser->clouser_amount = $validatedData['amount'];
    $clouser->location = $validatedData['location'];
    $clouser->date_time = $validatedData['date'];
    $clouser->message = $validatedData['message'];
    // $clouser->nooflocation = $validatedData['nooflocation'];
    // $clouser->connectiontype =  $validatedData['connectiontype'];

    // Save to database
    $clouser->save();
    // DB::table('clousers')->insert($validatedData);

    // Flash success message
    $request->session()->flash('success', 'Clouser service entry created successfully!');

    // Redirect back to the form
    return redirect()->back();
}
    

    public function go_Clouserdetails()
    {

        // $clousers = Clouser::all();
        // $clousers = DB::table('clousers')
        // ->join('users', 'clousers.service_id', '=', 'users.service_id')
        // ->select('clousers.*', 'users.userType as userType')
        // ->get();


    //    return view('clouser-details',compact('clousers'));

        $admins = DB::table('clousers')
        ->join('users', 'clousers.service_id', '=', 'users.service_id')
        ->select('clousers.*', 'users.userType as userType', 'users.name as name')
        ->where('users.userType', 'admin')
        ->get();
        
        $technicians = DB::table('clousers')
        ->join('users', 'clousers.service_id', '=', 'users.service_id')
        ->select('clousers.*', 'users.userType as userType', 'users.name as name')
        ->where('users.userType', 'technician')
        ->get();
        
        return view('clouser-details', compact('admins', 'technicians'));
   }



   public function go_Adminclouseradd()
   {
      return view('admin_clouseradd');
  }
 
 

  
  

   public function editClouser($id){

    
        $clouserDetails = Clouser::find($id);

        $clouserDetails->date = $clouserDetails->date_time ? Carbon::parse($clouserDetails->date_time)->format('Y-m-d\TH:i') : null;

        return view('edit_clouser', compact('clouserDetails'));

    
    
   }

   public function updateClouser(Request $request, $id){

    $clouserDetails = Clouser::find($id);


    $clouserDetails->clouser_ID = $request->clouserID;
    $clouserDetails->service_id = $request->serviceID;
    $clouserDetails->category = $request->category;
    $clouserDetails->clouser_type = $request->clouserType;
    $clouserDetails->clouser_amount = $request->amount;
    $clouserDetails->location = $request->location;
    $clouserDetails->date_time = $request->date;
    $clouserDetails->message = $request->message;
    $clouserDetails->nooflocation = $request->nooflocation;
    $clouserDetails->connectiontype = $request->connectiontype;


    $clouserDetails->save();

    
    $request->session()->flash('success', 'Clouser service  updated successfully!');

    return redirect('clouser-details');

   }


   public function deleteClouser(Request $request,$id)
   {

    $clouserDetails = Clouser::find($id);

    $clouserDetails->delete();

    
    $request->session()->flash('success', 'Clouser service  deleted successfully!');

    return redirect('clouser-details');
   }

   public function dashboard()
    {
    
        
        
    }
}
