<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App;
class LocalizationController extends Controller
{
    public function lang_change(Request $request) {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        $clientes = Cliente::all();
        return view('index',compact('clientes'));
    }
}
