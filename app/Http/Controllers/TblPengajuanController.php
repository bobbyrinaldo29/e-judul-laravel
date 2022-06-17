<?php

namespace App\Http\Controllers;

use App\Models\TblProdi;
use App\Models\TblListJudul;
use App\Models\TblPengajuan;
use Illuminate\Http\Request;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;
use Validator;
use PDF;

class TblPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('landingPage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rules = [
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'judul' => 'unique:tbl_pengajuans',
            'email' => 'required',
        ];

        $message = [
            'judul.unique' => 'Maaf, Judul yang anda ajukan sudah ada',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = new TblPengajuan;
        $data->nim = $request->nim;
        $data->nama = $request->nama;
        $data->prodi = $request->prodi;
        $data->pengajuan = $request->pengajuan;
        $data->judul = $request->judul;
        $data->email = $request->email;

        $simpen = $data->save();


        if ($simpen) {
            return redirect('landingPage');
        } else {
            Session::flash('errors', ['' => 'Input Data Gagal']);
            return redirect('search');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TblPengajuan  $tblPengajuan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $keyword = $request->search;
        $result = TblListJudul::where('namaJudul', 'like', "%" .$keyword. "%" )->get("namaJudul");
        
        $sim = similar_text($keyword, $result, $percent);
        $perc = round($percent, 2);

        $prodi = TblProdi::all();

        return view('result', compact('result', 'keyword', 'perc', 'prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TblPengajuan  $tblPengajuan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengaju = TblPengajuan::where('id', $id)->get();
        return view('admin.pengaju.edit', compact('pengaju'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TblPengajuan  $tblPengajuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
            'saran' => 'required',
        ]);

        $emailId = TblPengajuan::where('id', $id)->get();
        $list = TblPengajuan::findOrFail($id);
        $data = [
            'nama' => $request->nama,
            'judul' => $request->judul,
            'email' => $request->email,
            'status' => $request->status,
            'saran' => $request->saran,
            'url' => 'http://127.0.0.1:8000/download/pdf',
        ];

        $kirim = Mail::to($emailId)->send(new MailNotify($data));
        $list->update($data);
        if (!$kirim) {
            return redirect('dashboard')->withSuccess('Data Berhasil Di Kirim Ke Mahasiswa');
        } else {
            return redirect('dashboard')->withSuccess('Data Berhasil Di Kirim Ke Mahasiswa');
        }
    }

    public function diterima()
    {
        $list = TblPengajuan::where('status', '1')->get();
        return view('admin.pengaju.diterima', compact('list'));
    }

    public function diproses()
    {
        $list = TblPengajuan::where('status', '0')->get();
        return view('admin.pengaju.diproses', compact('list'));
    }

    public function ditolak()
    {
        $list = TblPengajuan::where('status', '2')->get();
        return view('admin.pengaju.ditolak', compact('list'));
    }

    public function generatePDF()
    {
        $pdf = PDF::loadView('pdf_view');

        return view('pdf_view');

        //return $pdf->download('pdf_file.pdf');
    }
}
