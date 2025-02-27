<?php

namespace App\Http\Controllers;


use App\Models\Clouser; // Import the Clouer model
use Illuminate\Http\Request;
use App\Models\User;



class AdminController extends Controller
{
    public function index()
    {

        // Get the total counts
        $totalTechnicians = User::where('userType', 'technician')->count();
        $totalAdmins = User::where('userType', 'admin')->count();
        $totalAccounts = User::count();
        $totalTMessages = Clouser::count();
        $clouserCount =(int) Clouser::sum('clouser_amount'); // Change this line to sum the amount

        // Return the correct view path
        return view('admin_dashboard', compact('totalTechnicians', 'totalAdmins', 'clouserCount', 'totalAccounts', 'totalTMessages'));



    }


    public function addClouersbyadmin() 
    {
        return view('admin_clouseradd');
    }

    public function viewMessages()
     {
        $messages = Clouser::select('service_id','date_time','message')->get(); 

        return view('admin_viewmessages',compact('messages'));
    }
       
    public function viewTechnicians() 
{
    // Fetch only users with userType as 'technician'
    $technicians = User::select('service_id', 'name', 'userType', 'contact_number', 'email')
                       ->where('userType', 'technician')
                       ->get();

    return view('admin_viewtechnicians', compact('technicians'));

    
}




// public function showDashboard()
//     {
//         // Count users where 'user_type' is 'technician'
//         $totalTechnicians = User::where('user_type', 'technician')->count();

//         // Pass the count to the view
//         return view('admin_dashboard', compact('totalTechnicians'));
//     }

    public function viewAdmins() 
    {
        $admins = User::select('service_id', 'name', 'userType', 'contact_number', 'email')
                       ->where('userType', 'admin')
                       ->get();
        
        return view('admin_viewadmins', compact('admins'));
    }

    public function viewAccounts() 
    {
        return view('admin_viewaccounts');
    }

    public function example()
     {
        return view('admin_example');
    }

   
    public function general_information()
    {
        return view('genaral_information');
    }

    public function connectionType_maintainance()
    {
        return view('connectionType_maintainance');
    }

    public function connectionType_new()
    {
        return view('connectionType_new');
    }

   

    // public function handleGeneralInformation(Request $request) {
    //     $connectionType = $request->input('connectionType');
    //     if ($connectionType === 'maintenance') {
    //         return redirect()->route('connectionType_maintainance');
    //     } else {
    //         // Handle "new" connection type logic here
    //     }
    // }
    
    public function handleDashboardSubmission(Request $request)
{

    // dd ($request->all());


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
        'nooflocation' => 'required|numeric',
        'connectiontype'=> 'required|string'

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
    $clouser->nooflocation = $validatedData['nooflocation'];
    $clouser->connectiontype =  $validatedData['connectiontype'];

    // Save to database
    $clouser->save();

    // Redirect based on the connection type
    if ($validatedData['connectiontype'] === 'Maintainance') {
        return redirect()->route('connectionType_maintainance');
    }elseif ($validatedData['connectiontype'] === 'New') {
        return redirect()->route('connectionType_new');
    }

    // Handle other connection types or redirect back with a success message
    return redirect()->back()->with('success', 'Form submitted successfully!');
}

    }



