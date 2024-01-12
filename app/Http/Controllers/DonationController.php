<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DonationController extends Controller
{

    private function successMessage($msg, $data = [], $status_code = 200): JsonResponse
    {
        return response()->json([
            'status' => "success",
            'data' => $data,
            'message' => $msg
        ], $status_code);
    }

    private function errorMessage($msg, $data = [], $status_code = 400): JsonResponse
    {
        return response()->json([
            'status' => "error",
            'data' => $data,
            'message' => $msg
        ], $status_code);
    }


    public function create_donation()
    {
        return view('create_donation');
    }


    public function view_all_donations()
    {
        try{
            $donations = Donation::where('status', 'done');

            if($donations->exists()){
                $donations = $donations->get();
                return $this->successMessage("All Pending Donations Retrieved", $donations, 200);
            } else{
                return $this->successMessage("No Currently Pending Donations", [], 200);
            }
        }catch(\Exception $err){
            Log::error("Error: ". $err->getMessage());
            return $this->errorMessage("Error", $err->getMessage(), 400); 
        }
    }

    public function view_one_donation($id)
    {
        $donation = Donation::find($id);
        return view('donation_one')->with('donation', $donation);
    }

    public function setup_donation(Request $request)
    {
        try {
            $user_id = Auth::user()->id();

            $validated = $request->validate([
                'target' => 'required',
                'donation_title' => 'required',
                'donation_text' => 'required',
            ]);

            $donation = Donation::create([
                'user_id' => $user_id,
                'target' => request('target'),
                'donation_title' => request('donation_title'),
                'donation_text' => request('donation_text'),
                'status' => 'created'
            ]);

            $donation->save();

            return $this->successMessage("Donation Registration Complete", $donation, 200);
        } catch (\Exception $err) {
            Log::error('Error Creating Donation:' . $err->getMessage());
            return $this->errorMessage("Error", $err->getMessage(), 400);
        }
    }


    public function donate(Request $request, $id)
    {
        try{
            $validated = $request->valididate([
                'donation' => 'required',
            ]);

            $donation = Donation::find($id);
            if($donation->exists()){
                $donation->first();



            }



        } catch (\Exception $err) {
            Log::error('Error Donating:' . $err->getMessage());
            return redirect()->back()->with('error', $err->getMessage());
        }
    }

}
