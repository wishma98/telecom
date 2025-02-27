<?php

namespace App\Http\Controllers;

use App\Models\TableLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LocationController extends Controller
{
    /**
     * Store data from the new blade view.
     */
    public function storeFromNewBlade(Request $request)
    {
        // Validate input
    //     $validatedData = $request->validate([
    //         'location_name' => 'required|string',
    //         'longitude_end_a' => 'required|string',
    //         'latitude_end_a' => 'required|string',
    //         'photo_end_a' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Max 2MB
    //         'lea' => 'required|in:LEA1,LEA2,LEA3',
    //         'closure_used' => 'required|in:Yes,No',
    //     ]);

    //     dd($validatedData);


    //     // Handle END_A photo upload
    //     $endAPhotoPath = $request->file('photo_end_a')->store('photos', 'public');

    //     // Store data in the database
    //     $location = TableLocation::create([
    //         'location_name' => $validatedData['location_name'],
    //         'END_A_LONGITUDE' => $validatedData['longitude_end_a'],
    //         'END_A_LATITUDE' => $validatedData['latitude_end_a'],
    //         'END_A_PHOTO' => $endAPhotoPath,
    //         'LEA' => $validatedData['lea'],
    //         'closure_used' => $validatedData['closure_used'],
    //     ]);

    //     if ($location) {
    //         $request->session()->flash('success', 'New location entered successfully!');
    //     } else {
    //         $request->session()->flash('error', 'Failed to save location!');
    //     }

    //     return redirect()->back();
    // }

    // /**
    //  * Store data from the maintenance blade view.
    //  */
    // public function storeFromMaintenanceBlade(Request $request)
    // {
    //     // Validate input
    //     $validatedData = $request->validate([
    //         'location_name' => 'required|string',
    //         'longitude_end_a' => 'required|string',
    //         'latitude_end_a' => 'required|string',
    //         'photo_end_a' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Max 2MB
    //         'longitude_end_b' => 'nullable|string',
    //         'latitude_end_b' => 'nullable|string',
    //         'photo_end_b' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Max 2MB
    //         'lea' => 'required|in:LEA1,LEA2,LEA3',
    //         'closure_used' => 'required|in:Yes,No',
    //     ]);

    //     dd($validatedData);


    //     // Handle photo uploads
    //     $endAPhotoPath = $request->file('photo_end_a')->store('photos', 'public');
    //     $endBPhotoPath = $request->file('photo_end_b') ? $request->file('photo_end_b')->store('photos', 'public') : null;

    //     // Store data in the database
    //     $location = TableLocation::create([
    //         'location_name' => $validatedData['location_name'],
    //         'END_A_LONGITUDE' => $validatedData['longitude_end_a'],
    //         'END_A_LATITUDE' => $validatedData['latitude_end_a'],
    //         'END_A_PHOTO' => $endAPhotoPath,
    //         'END_B_LONGITUDE' => $validatedData['longitude_end_b'],
    //         'END_B_LATITUDE' => $validatedData['latitude_end_b'],
    //         'END_B_PHOTO' => $endBPhotoPath,
    //         'LEA' => $validatedData['lea'],
    //         'closure_used' => $validatedData['closure_used'],
    //     ]);

    //     if ($location) {
    //         $request->session()->flash('success', 'Maintenance location entered successfully!');
    //     } else {
    //         $request->session()->flash('error', 'Failed to save maintenance location!');
    //     }

    //     return redirect()->back();
    // }

    // dd ($request->all());

    $validatedData = $request->validate([
                'location_name' => 'required|string',
                'longitude_end_a' => 'required|string',
                'latitude_end_a' => 'required|string',
                'photo_end_a' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Max 2MB
                'longitude_end_b' => 'nullable|string',
                'latitude_end_b' => 'nullable|string',
                'photo_end_b' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Max 2MB
                'lea' => 'required|in:LEA1,LEA2,LEA3',
                'closure_used' => 'required|in:Yes,No',
            ]);
    // dd ($validatedData);


            $new = new TableLocation();

            $new ->location_name = $validatedData['location_name'];
            $new ->END_A_LONGITUDE = $validatedData['longitude_end_a'];
            $new ->END_A_LATITUDE = $validatedData['latitude_end_a'];
            $new ->END_A_PHOTO = $validatedData['photo_end_a'];

            $new ->END_B_LONGITUDE = $validatedData['longitude_end_b']?? null;
            $new ->END_B_LATITUDE = $validatedData['latitude_end_b'] ?? null;
            $new ->END_B_PHOTO =  $validatedData['photo_end_b'] ?? null;

            $new ->LEA = $validatedData['lea'];
            $new ->clouser_used = $validatedData['closure_used'];


            if ($request->hasFile('photo_end_a')) {
                $pathA = $request->file('photo_end_a')->store('photos', 'public'); // Save in storage/app/public/photos
                $new->END_A_PHOTO = $pathA;
            }
            
            if ($request->hasFile('photo_end_b')) {
                $pathB = $request->file('photo_end_b')->store('photos', 'public');
                $new->END_B_PHOTO = $pathB;
            }


            $new->save();


            $request->session()->flash('success', 'Clouser service entry created successfully!');

            return redirect()->back();


        }

       
}



