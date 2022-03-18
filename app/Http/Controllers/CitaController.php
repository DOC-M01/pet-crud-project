<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

use Carbon\Carbon;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('cita.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request() -> validate(Cita::$rules);
        $data = Cita::create($request -> all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        //
        $datos = Cita::all();
        return response() -> json($datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $datos = Cita::find($id);
        $datos -> start = Carbon::createFromFormat('Y-m-d H:i:s', $datos -> start) -> format('Y-m-d');
        $datos -> end = Carbon::createFromFormat('Y-m-d H:i:s', $datos -> end) -> format('Y-m-d');
        return response() -> json($datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        //
        request() -> validate(Cita::$rules);
        $cita -> update($request -> all());
        return response() -> json($cita);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $datos = Cita::find($id) -> delete();

        return response() -> json($datos);
    }
}