<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


$jobs = [
    [
        'id' => 1,
        'title' => ' Director',
        'salary' => '$5000',  
    ],
    [
        'id' => 2,
        'title' => ' Programmer',
        'salary' => '$8000',  
    ],
    [
        'id' => 3,
        'title' => ' Sales Agent',
        'salary' => '$6000',  
    ],
];


Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () use ($jobs) {
    return view('jobs', [
        'jobs' => $jobs
    ]);
});



Route::get('/jobs/{id}', function ($id) use ($jobs) {

 
  $job = Arr::first($jobs, fn($job) => ($job['id'] == $id));

    return view('job', ['job'=> $job]);
});



Route::get('/contact', function() {
    return view('contact');
});

