<?php

namespace App\Http\Controllers\Scanner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowScannerController extends Controller
{
    public function __invoke()
    {
        return view('scanner.show');
    }
}
