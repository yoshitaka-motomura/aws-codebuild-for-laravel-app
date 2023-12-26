<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Log;
class DemoController extends Controller
{
    public $carbon;
    public function __construct(Carbon $carbon)
    {
        $this->carbon = $carbon;
    }
    public function index()
    {
        Log::info('Log');
        $now = $this->carbon->now();
        return view('demo', compact('now'));
    }
}
