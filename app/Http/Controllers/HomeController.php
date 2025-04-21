<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Helpers\LogActivity;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Testing log activity.
     *
     * @return void
     */
    public function myTestAddToLog()
    {
        LogActivity::addToLog('My Testing Add To Log.');
        dd('Log inserted successfully.');
    }

    /**
     * Show log activity list.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function logActivity(): View
    {
        $logs = LogActivity::logActivityLists();
        return view('logActivity', compact('logs'));
    }

    /**
     * Show the operator dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        return view('operator');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function adminHome(): View
    {
        return view('admin');
    }

    /**
     * Show the manager dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function managerHome(): View
    {
        return view('dashboard');
    }
}
