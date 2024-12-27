<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Job_Opening;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jobs = Job_Opening::get();
        return Inertia::render('Dashboard',[
            'jobs' => $jobs
        ]);
    }
}
