<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessSubmission;
use App\Models\Submission;
use App\Events\SubmissionSaved;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Dispatch job to process the submission
        ProcessSubmission::dispatch($validatedData);

        return response()->json(['message' => 'Submission received and will be processed.']);
    }
}
