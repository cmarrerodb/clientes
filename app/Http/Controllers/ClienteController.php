<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use App;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function locale() {
        $locale = session()->get('locale');
        App::setLocale($locale);
        return;
    }
    public function index()
    {
        if (null !== session()->get('locale'))
            $this->locale();

        $clientes = Cliente::all();
        return view('index',compact('clientes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->locale();
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData =$request->validate([
            'rut'=>'required|max:11',
            'nombre_fantasia'=>'required',
            'razon_social'=>'required',
            'direccion'=>'required',
        ]);
        $show = Cliente::create($validateData);
        $this->locale();
        return redirect('/clientes')->with('success',config('lenguages.'.app()->getLocale().'.CLIENT_CREATED'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locale = session()->get('locale');
        App::setLocale($locale);
        $cliente = Cliente::findOrFail($id);
        $this->locale();
        return view('edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validateData=$request->validate([
            'rut'=>'required',
            'nombre_fantasia'=>'required',
            'razon_social'=>'required',
            'direccion'=>'required',
        ]);
        Cliente::where("id",'=',$id)->update($validateData);
        $this->locale();
        return redirect('/clientes')->with('success', config('lenguages.'.app()->getLocale().'.CLIENT_UPDATED'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        DB::enableQueryLog();
        $cliente->delete();
        $this->locale();
        return redirect('/clientes')->with('success', config('lenguages.'.app()->getLocale().'.CLIENT_DELETED'));
    }
}
