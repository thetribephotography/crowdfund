<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{

    public function create_donation(){
        return view('create_donation');
    }
   public function view_all_donations()
   {
    $donations = Donation::all();
    return view('dashboard')->with('donations', $donations);
   }

   public function view_one_donation($id)
   {
    $donation = Donation::find($id);
    return view('donation_one')->with('donation', $donation);
   }

   public function setup_donation(Request $request)
   {
        $user_id = Auth::user()->id();

        $validated = $request->validate([
            'target' => 'required',
            'current_balance' => 'required',
            'donation_text' => 'required',
        ]);

        $donation = Donation::create([
            'user_id' => $user_id,
            'target' => request('target'),
            'current_balance' => request('current_balance'),
            'donation_text' => request('donation_text'),
            'status' => 'created'
        ]);

        $donation->save();

        return route('dashboard');

   }

}
