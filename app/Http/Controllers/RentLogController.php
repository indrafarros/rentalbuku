<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index()
    {
        $rent_logs = RentLogs::with(['user', 'book'])->paginate(15);
        return view('rentlog', ['rent_logs' => $rent_logs]);
    }
}
