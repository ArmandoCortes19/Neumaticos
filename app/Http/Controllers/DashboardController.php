<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        return match ($role) {
            'admin' => redirect()->route('admin'),
            'slw'   => redirect()->route('slw'),
            'qet'   => redirect()->route('qet'),
            'butc'  => redirect()->route('butc'),
            default => redirect()->route('login'),
        };
    }
}
