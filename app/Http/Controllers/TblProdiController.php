<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdiRequest;
use App\Models\TblProdi;
use Illuminate\Http\Request;
use Validator;

class TblProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TblProdi::all();
        return view('admin.prodi.prodi', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProdiRequest $request)
    {
        $data = $request->validated();
        TblProdi::create($data);

        return redirect('prodi');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TblProdi  $tblProdi
     * @return \Illuminate\Http\Response
     */
    public function show(TblProdi $tblProdi)
    {
        return view('admin.prodi.add');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TblProdi  $tblProdi
     * @return \Illuminate\Http\Response
     */
    public function edit(TblProdi $tblProdi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TblProdi  $tblProdi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TblProdi $tblProdi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TblProdi  $tblProdi
     * @return \Illuminate\Http\Response
     */
    public function destroy(TblProdi $tblProdi)
    {
        //
    }
}
