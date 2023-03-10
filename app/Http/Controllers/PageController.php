<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Inertia\Inertia;
use \Illuminate\Support\Facades\Route;

class PageController extends Controller
{
    public function welcome() {

        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    public function dashboard() {
        return Inertia::render('Dashboard');
    }

    public function chat() {
        return Inertia::render('Chat');
    }
}
