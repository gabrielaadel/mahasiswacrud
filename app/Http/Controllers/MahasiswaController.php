<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Mahasiswa::where('nama' , 'LIKE' , '%' .$request->search. '%')->paginate(5);
        }else{
            $data = Mahasiswa::paginate(5);
        }

        return view('datamahasiswa',compact('data'));
    }

    public function tambahmahasiswa(){
        return view('tambahdata');
    }

    public function insertdata(Request $request){
        //dd($request->all());
        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa')->with('success','Data Added Successfully');
    }

    public function tampilkandata($id){

        $data = Mahasiswa::find($id);
        //dd($data);

        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = Mahasiswa::find($id);
        $data->update($request->all());
        return redirect()->route('mahasiswa')->with('success','Data Updated Successfully');
    }

    public function delete($id){
        $data = Mahasiswa::find($id);
        $data->delete();
        return redirect()->route('mahasiswa')->with('success','Data Deleted Successfully');
    }

    public function exportpdf(){
        $data = Mahasiswa::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('datamahasiswa-pdf');
        return $pdf->download('data.pdf');
    }

    public function exportexcel(){
        return Excel::download(new MahasiswaExport, 'datamahasiswa.xlsx');
    }

    public function importexcel(Request $request){
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('MahasiswaData', $namafile);

        Excel::import(new MahasiswaImport, \public_path('/MahasiswaData/'.$namafile));
        return \redirect()->back();
    }
}
