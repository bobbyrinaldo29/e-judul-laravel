<?php

namespace App\Http\Controllers;

use App\Models\ThnAjaran;
use Illuminate\Http\Request;

class ThnAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = ThnAjaran::all();
        return view('admin.dashboard', compact('list'));
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
        $request->validate([
            'thn_ajaran' => 'required',
        ]);

        ThnAjaran::create([
            'thn_ajaran' => $request->thn_ajaran
        ]);

        return redirect('dashboard')->withSuccess('Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ThnAjaran  $thnAjaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tbl_ajaran = ThnAjaran::where('id', $id)->get();
        return view('admin.edit_thn_ajaran', compact('tbl_ajaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ThnAjaran  $thnAjaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $thnEdit = ThnAjaran::findOrFail($id);
        $data = [
            'status' => $request->status,
        ];
        $thnEdit->update($data);

        return redirect('dashboard')->withSuccess('Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ThnAjaran  $thnAjaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thnAjaran = ThnAjaran::findOrFail($id);
        $status = ThnAjaran::where('status')->get();
        if ($status == '0') {
            $thnAjaran->delete();
            return redirect('dashboard')->withSuccess('Data Berhasil Dihapus');
        } else {
            return redirect('dashboard')->withErrors('Status Masih Aktif, Data Tidak Bisa Dihapus');
        }
    }
}
