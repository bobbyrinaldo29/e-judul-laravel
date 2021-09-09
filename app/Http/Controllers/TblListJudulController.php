<?php

namespace App\Http\Controllers;

use App\Models\ThnAjaran;
use App\Models\TblListJudul;
use Illuminate\Http\Request;
use Validator;

class TblListJudulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = TblListJudul::all();
        return view('admin.listjudul.list', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $rules = [
            'namaJudul' => 'unique:tbl_list_juduls',
            'thn_ajaran_id' => 'required',
            'penulis' => 'required',
            'metode' => 'required',
            'abstrak' => 'required',
        ];

        $message = [
            'namaJudul.unique' => 'Judul Sudah Terdaftar',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = new TblListJudul;

        $data->namaJudul = $request->namaJudul;
        $data->thn_ajaran_id = $request->thn_ajaran_id;
        $data->penulis = $request->penulis;
        $data->metode = $request->metode;
        $data->abstrak = $request->abstrak;

        $simpen = $data->save();

        if ($simpen) {
            return redirect('list_judul');
        } else {
            Session::flash('errors', ['' => 'Input Data Gagal']);
            return redirect('list_judul');
        }
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
     * @param  \App\Models\TblListJudul  $tblListJudul
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $thn = ThnAjaran::all();
        return view('admin.listjudul.form-list', compact('thn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TblListJudul  $tblListJudul
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thn = ThnAjaran::all();
        $listjudul = TblListJudul::where('id', $id)->get();
        return view('admin.listjudul.edit', compact('listjudul', 'thn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TblListJudul  $tblListJudul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'namaJudul' => 'required',
            'thn_ajaran_id' => 'required',
            'penulis' => 'required',
            'metode' => 'required',
            'abstrak' => 'required',
        ]);

        $list = TblListJudul::findOrFail($id);
        $data = [
            'namaJudul' => $request->namaJudul,
            'thn_ajaran_id' => $request->thn_ajaran_id,
            'penulis' => $request->penulis,
            'metode' => $request->metode,
            'abstrak' => $request->abstrak,
        ];
        $list->update($data);

        return redirect('list_judul')->withSuccess('Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TblListJudul  $tblListJudul
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tblList = TblListJudul::findOrFail($id);
        $tblList->delete();
        return redirect('list_judul')->withSuccess('Data Berhasil Dihapus');
    }
}
