<?php

namespace App\Jobs;

use App\Models\Submission;
use App\Events\SubmissionSaved;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessSubmission implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $submissionData;

    public function __construct($submissionData)
    {
        $this->submissionData = $submissionData;
    }

    public function handle()
    {
        $submission = Submission::create($this->submissionData);

        event(new SubmissionSaved($submission));
    }
}
