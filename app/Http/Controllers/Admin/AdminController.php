<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::latest()->paginate(10);
        return view('admin.feedbackadmin.index', compact('feedbacks'));
    }

    public function show(Feedback $feedback)
    {
        return view('admin.feedbackadmin.show', compact('feedback'));
    }

    public function edit(Feedback $feedback)
    {
        return view('admin.feedbackadmin.edit', compact('feedback'));
    }

    public function update(Request $request, Feedback $feedback)
    {
        $feedback->update($request->only(['status', 'response']));
        return redirect()->route('admin.feedbackadmin.index')->with('success', 'Feedback updated successfully!');
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('admin.feedbackadmin.index')->with('success', 'Feedback deleted successfully!');
    }
}