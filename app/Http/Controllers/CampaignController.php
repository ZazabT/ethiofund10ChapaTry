<?php

namespace App\Http\Controllers;


use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
class CampaignController extends Controller
{
    // Show All Campaign

    public function index(){

        // try get all campains and pass the latest 10 
        try{
            $campaigns = Campaign::latest()->get();
            return view('home', compact('campaigns'));
        } catch (\Exception $e) {
            Log::error('Error fetching campaigns: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while loading campaigns.');
        }
    }

   // Show create campaign form
   public function create(){

   }

   // Create and Save or Store campaign 
   public function store(Request $request){

    
   }

}
