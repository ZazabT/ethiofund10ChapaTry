<?php

namespace App\Http\Controllers;


use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
class CampaignController extends Controller
{
    // Show All Campaign

    public function index() {
        try {
            $campaigns = Campaign::latest()->take(10)->get();
            return view('home', compact('campaigns'));
        } catch (\Exception $e) {
            Log::error('Error fetching campaigns: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while loading campaigns.');
        }
    }
    
   // Show create campaign form
   public function create(){
    return view('campaign.create');
   }

   // Create and Save or Store campaign 
   public function store(Request $request){

    // try to add campain 
    try{

        // validating request
       $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal_amount' => 'required|numeric|min:1',
            'deadline' => 'required|date',
        ]);

        // create campaign
        $campaign = new Campaign();
        $campaign->user_id = auth()->id();
        $campaign->title = $request->title;
        $campaign->description = $request->description;
        $campaign->goal_amount = $request->goal_amount;
        $campaign->deadline = $request->deadline;
        $campaign->save();
        return redirect()->route('home')->with('success', 'Campaign created successfully!');
    }catch (\Exception $e) {
            Log::error('Error Creating Campaign: ' . $e->getMessage());
            return back()->with('error', 'Failed to create campaign. Please try again.');
        }
   }

   // Show a specific campaign by ID
   public function show($id){
    try{
        $campaign = Campaign::findOrFail($id);
        return view('campaign.show', compact('campaign'));
    }catch (\Exception $e) {
            Log::error('Error fetching campaign: ' . $e->getMessage());
            return back()->with('error', 'Campaign not found.'. $e->getMessage());
        }
   }

}
