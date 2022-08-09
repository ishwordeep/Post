<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\PostLikes;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $user=auth()->user();
        Mail::to('ishworisdon@gmail.com')->send(new PostLikes);
        return view('dashboard');
    }
}
