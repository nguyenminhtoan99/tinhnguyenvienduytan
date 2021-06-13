<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class DonateController extends Controller
{
    public function index(){
        $sponsors = DB::table('sponsors')
        ->get();
        
        return view('main.pages.donate', compact('sponsors'));
    }
}
