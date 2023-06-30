<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['getTrackById','getTrackingData','postTrackingData','updateTrackById','deleteTrackById','getTrackByNum','sendMail']]);
    }

    public function getTrackById(Request $request){

        $track = Tracking::find($request->id)->first();

        return response()->json([
            'id' => $track->id,
            'tracking_number' => $track->tracking_number,
            'package' => $track->package,
            'sender_name' => $track->sender_name,
            'sender_telephone' => $track->sender_telephone,
            'sender_email' => $track->sender_email,
            'sender_city' => $track->sender_city,
            'sender_country' => $track->sender_country,
            'sender_zipcode' => $track->sender_zipcode,
            'sender_address' => $track->sender_address,
            'recipient_name' => $track->recipient_name,
            'recipient_telephone' => $track->recipient_telephone,
            'recipient_email' => $track->recipient_email,
            'recipient_city' => $track->recipient_city,
            'recipient_country' => $track->recipient_country,
            'recipient_zipcode' => $track->recipient_zipcode,
            'recipient_address' => $track->recipient_address,
            'delivery_status' => $track->delivery_status,
            'tracking_date' => $track->tracking_date,
        ]);
    }

    public function getTrackByNum(Request $request){
        $track = Tracking::where('tracking_number', $request->track)->first();

        return $track;
        /* return response()->json([
            'id' => $track->id,
            'tracking_number' => $track->tracking_number,
            'package' => $track->package,
            'sender_name' => $track->sender_name,
            'sender_phone' => $track->sender_telephone,
            'sender_email' => $track->sender_email,
            'sender_city' => $track->sender_city,
            'sender_country' => $track->sender_country,
            'sender_zipcode' => $track->sender_zipcode,
            'sender_address' => $track->sender_address,
            'recipient_name' => $track->recipient_name,
            'recipient_phone' => $track->recipient_telephone,
            'recipient_email' => $track->recipient_email,
            'recipient_city' => $track->recipient_city,
            'recipient_country' => $track->recipient_country,
            'recipient_zipcode' => $track->recipient_zipcode,
            'recipient_address' => $track->recipient_address,
            'tracking_status' => $track->delivery_status,
            'tracking_date' => $track->tracking_date,
        ]); */
    }

    public function postTrackingData(Request $request){

       $tracking = Tracking::create([
            'tracking_number' => $request->tracking_number,
            'package' => $request->tracking_package,
            'sender_name' => $request->sender_fname .' '. $request->sender_lname ,
            'sender_telephone' => $request->sender_phone,
            'sender_email' => $request->sender_email,
            'sender_city' => $request->sender_city,
            'sender_country' => $request->sender_country,
            'sender_zipcode' => $request->sender_zipcode,
            'sender_address' => $request->sender_address,
            'recipient_name' => $request->recipient_fname . ' ' . $request->recipient,
            'recipient_telephone' => $request->recipient_phone,
            'recipient_email' => $request->recipient_email,
            'recipient_city' => $request->recipient_city,
            'recipient_country' => $request->recipient_country,
            'recipient_zipcode' => $request->recipient_zipcode,
            'recipient_address' => $request->recipient_address,
            'delivery_status' => $request->tracking_status,
        ]);

        if($tracking){
        return response()->json([
            "status" => "inserted successful"
        ]);
    }
    else{
        return response()->json([
            "status" => "Data not saved"
        ]);
    }
    }

    public function getTrackingData(){
        $tracking = Tracking::get();

        return  $tracking;
    }

    public function updateTrackById(Request $request){
        $tracking = Tracking::where('id',$request->tracking_id)
        ->update([
            'tracking_number' => $request->tracking_number,
            'package' => $request->tracking_package,
            'sender_name' => $request->sender_name ,
            'sender_telephone' => $request->sender_phone,
            'sender_email' => $request->sender_email,
            'sender_city' => $request->sender_city,
            'sender_country' => $request->sender_country,
            'sender_zipcode' => $request->sender_zipcode,
            'sender_address' => $request->sender_address,
            'recipient_name' => $request->recipient_name,
            'recipient_telephone' => $request->recipient_phone,
            'recipient_email' => $request->recipient_email,
            'recipient_city' => $request->recipient_city,
            'recipient_country' => $request->recipient_country,
            'recipient_zipcode' => $request->recipient_zipcode,
            'recipient_address' => $request->recipient_address,
            'delivery_status' => $request->tracking_status,
        ]);

        if($tracking){
            return response()->json([
                "status" => "updated successful"
            ]);
        }
        else{
            return response()->json([
                "status" => "Data not update ". $tracking
            ]);
        }
    }

    public function deleteTrackById(Request $request){
        $track = Tracking::find($request->id)->delete();

        return "deleted";
    }

    public function sendMail(){

    }


}
