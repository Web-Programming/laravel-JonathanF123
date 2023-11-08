<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class prodicontroller extends Controller
{
    public function index(){
        $kampus = "Universitas MDP";
        return view("prodi.index")->with('KAMPUS', $kampus);
    }

    public function allJoinFacade(){
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select mahasiswas.*, prodis.nama as nama_prodi from prodis, mahasiswas where prodis.id = mahasiswas.prodi_id');
        return view('prodi.index',['allmahasiswa' => $result, 'kampus' => $kampus]);
    }

    public function allJoinElq(){
        //$prodis = Prodi::all();
        $prodis = Prodi::with('mahasiswas')->get();
        foreach ($prodis as $prodi) {
            echo "<h3>{$prodi->nama}</h3>";
            echo "<hr>Mahasiswa: ";
            foreach ($prodi ->mahasiswas as $mhs ) {
                echo $mhs->nama. ", ";
            }
            echo "<hr>";
        }
    }
    public function create(){
        return view('prodi.create');
    }

    public function store(Request $request){
        // dump($request);
        // echo $request->nama;

        $validateData = $request->validate([
            'nama' => 'required|min:5|max20',
        ]);
        // dump($valitedata);
        // echo $valitedata['nama'];

        $prodi = new Prodi(); //Nilai Buat Objek
        $prodi->nama = $validateData['nama']; //Simpan Nilai input ($valitedata['nama']) ke dalam propert nama prodi ($prodi->nama)
        $prodi->save(); //Simpan ke dalam tabel prodis

        //Retrun "Data prodi $prodi->nama berhasil disimpan ke database"; //tampilkan pesan berhasil
        $request->session()->flash('info',"Data prodi $prodi->nama berhasil disimpan ke database");
        return redirect()->route('prodi.create');
    }
}
