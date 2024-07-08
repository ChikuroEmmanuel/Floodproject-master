<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(){
        
        return view('feedback');

    }
    
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'message' => 'required|string',
        ]);


        $feedback = new Feedback();
        $feedback->type = $request->input('type');
        $feedback->message = $request->input('message');
        $feedback->user_id = auth()->id();
        $feedback->save();

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }
}
