<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
        
        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => '10'
        ]);

        Mail::to($job->employer->user)->queue(
            new JobPosted ($job)
        );

        return redirect('/jobs');
    }  


    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }


    public function update(Job $job)
    {
        //Step 1-authorize(On hold...for now)
        //Step 2-validate
        request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
        ]);

        //update the job -> // Method 1
        $job->update([
        'title' => request('title'),
        'salary' => request('salary')
        ]);
        //Step 3-update the job -> // Method 2
        // $job->title = request('title');
        // $job->salary = request('salary');
        // $job->save();

        //Step 4-redirect on the job listing page
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        //Step 1-authorize(On hold...)
        //Step 2-delete the job
        $job->delete();
        //Step 3-redirect
        return redirect('/jobs');
    }              
}
