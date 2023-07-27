<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        if (auth()->user()->role == 'administrator') {
            $totalreports = Report::count();
            $reportsProcess = Report::where('status', 'process')->count();
            $reportsReturn = Report::where('status', 'return')->count();
            $reportsAccept = Report::where('status', 'accept')->count();

            $dataChart = User::where('role', '!=', 'administrator')
                ->withCount('reports as totalReport')
                ->withCount(['reports as processReport' => function ($query) {
                    $query->where('status', 'process');
                }])
                ->withCount(['reports as returnReport' => function ($query) {
                    $query->where('status', 'return');
                }])
                ->withCount(['reports as acceptReport' => function ($query) {
                    $query->where('status', 'accept');
                }])
                ->get();

            return view('dashboard.index', compact('totalreports', 'reportsProcess', 'reportsReturn', 'reportsAccept', 'dataChart'));
        } else {
            $totalreports = Report::where('user_id', auth()->user()->id)->count();
            $reportsProcess = Report::where('user_id', auth()->user()->id)->where('status', 'process')->count();
            $reportsReturn = Report::where('user_id', auth()->user()->id)->where('status', 'return')->count();
            $reportsAccept = Report::where('user_id', auth()->user()->id)->where('status', 'accept')->count();

            return view('dashboard.index', compact('totalreports', 'reportsProcess', 'reportsReturn', 'reportsAccept'));
        }
    }
}
