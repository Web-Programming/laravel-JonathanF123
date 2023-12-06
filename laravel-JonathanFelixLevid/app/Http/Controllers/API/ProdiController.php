<?php

namespace App\Http\Controllers\API;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class ProdiController extends BaseController
{
    public function index() {
        // mengambil data dari tabel prodis dan menyimpannya pada variable $prodis
        $prodis = Prodi::all();
        $success['data'] = $prodis;
        return $this->sendResponse($success, 'Data prodi.');
    }
    public function store(Request $request) {
         $validateData = $request->validate([
            'nama' => 'required|min:5|max:20',
            'foto' => 'required|file|image|max:5000',
        ]);

        $ext = $request->foto->getClientOriginalExtension();
        $nama_file = 'foto-' . time() . "." . $ext;
        $path = $request->foto->storeAs('public', $nama_file);

        //melakukan insert data
        $prodi = new Prodi();
        $prodi->nama = $validateData['nama'];
        $prodi->foto = $nama_file;

        //jika berhasil maka simpan data dengan method $post_save()
        if ($prodi->save()) {
            $success['data'] = $prodi;
            return $this->sendResponse($success, 'Data prodi berhasil disimpan.');
        }else{
            return $this->sendError('Eroor.', ['error' => 'Data prodi gagal disimpan.']);
        }
    }
       public function update(Request $request, $id) {
        // membuat validasi semua field wajib diisi
        $validasi = $request->validate([
            'nama' => 'required|min:5|max:20',
            'foto' => 'required|file|image|max:5000'
        ]);
        //ambil extension file
        $ext = $request->foto->getClientOriginalExtension();
        //ganti nama file
        $nama_file = "foto-" .time() . "." . $ext;
        //nama file baru : foto-1234343.png
        //simpan file ke dalam folder public
        $path = $request->foto->storeAs('public', $nama_file);

        //cari data prodi berdasarkan id
        $prodi = Prodi::Find($id);
        //isi property nama dan foto
        $prodi->nama = $validasi['nama'];
        $prodi->foto = $nama_file;

        //jika berhasil maka simpan data prodi dengan methode $prodi->save()
        if ($prodi->save()) {
            $success['data'] = $prodi;
            return $this->sendResponse($success, 'Data prodi berhasil diperbarui.');
        }else {
            return $this->sendError('Error.', ['error' => 'Data prodi gagal diperbarui.']);
        }

      }
      public function delete($id) {
        $prodi = Prodi::findOrFail($id);
        //hapus data menggunakan method delete()
        if ($prodi->delete()) {
            $success['data'] = [];
            return $this->sendResponse($success, "Data prodi dengan id $id berhasil dihapus");
        } else {
            return $this->sendError('Error', ['error' => 'Data prodi gagal dihapus']);
        }

        }

      }