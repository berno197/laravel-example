<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(6);

        return view('jobs/index', [
            'jobs' => $jobs
        ]);

    }

    public function create()
    {
        return view('jobs/create');
    }

    public function store()
    {
        $validated = request()->validate([
            'title' => 'required|min:3|max:255',
            'salary' => 'required'
        ]);

        Job::create([
            'title' => $validated['title'],
            'salary' => $validated['salary'],
            'employer_id' => 1 // For simplicity, assigning a static employer ID
        ]);

        return redirect('/jobs');
    }

    public function show(Job $job)
    {
        return view('jobs/show', ['job' => $job]);
    }

    public function edit(Job $job)
    {
        return view('jobs/edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        //authorize request
        //validate request
        $validated = request()->validate([
            'title' => 'required|min:3|max:255',
            'salary' => 'required'
        ]);
        $job->update($validated);
        //redirect back to job listing page
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        //authorize request
        //delete job
        $job->delete();
        //redirect back to job listing page
        return redirect('/jobs');
    }
}
