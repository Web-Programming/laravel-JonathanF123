<?php

namespace App\Http\Controllers;
use App\Models\prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{

    public function create(){
        return view('prodi.create');
    }

    public function store(Request $request){
        // dump($request);
        // echo $request->nama;
        $this->authorize('create', Prodi::class);

        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20',
            'foto' => 'required|file|image|max:5000',
        ]);
        // dump($validateData);
        // echo $validateData['nama'];

        //ambil ekstensi file
        $ext = $request->foto->getClientOriginalExtension();
        //rename nama file
        $nama_file = "foto-" .time() . "." .$ext;
        $path = $request->foto->storeAs('public',$nama_file);


        $prodi = new Prodi();
        $prodi->nama = $validateData['nama'];
        $prodi->foto = $nama_file;
        $prodi->save();

        $request->session()->flash('info',"Data Prodi $prodi->nama berhasil disimpan ke database");

        return redirect('prodi/create');

    }

    public function index(){
        $prodi = Prodi::all();
        return view('prodi.index')->with('prodis',$prodi);
    }

    public function show(Prodi $prodi)
    {
        return view('prodi.show',['prodi'=>$prodi]);
    }

    public function edit(Prodi $prodi)
    {
        return view('prodi.edit',['prodi'=>$prodi]);
    }

    public function update(Request $request, Prodi $prodi)
    {
        //dump($request)->all();
        //dump($prodi)
        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20',
        ]);

        Prodi::where('id' ,$prodi->id)->update($validateData);
        $request->session()->flash('info', "Data prodi $prodi->nama berhasil diubah");
        return redirect('prodi');
    }

    public function destroy(Prodi $prodi)
    {
        $this->authorize('delete',$prodi);
        $prodi->delete();
        return redirect('prodi')->with('info','Prodi $prodi->nama berhasil dihapus');
    }
}