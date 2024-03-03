<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\like;
use App\Models\User;
use App\Models\album;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UploadController extends Controller
{
    public function index()
    {
        $profile = User::where('id', auth()->user()->id)->first();
        return view('user.index', compact('profile'));
    }
    public function getdata(Request $request)
    {
        $index = foto::with(['like', 'user'])->withCount(['like', 'comment'])->paginate();
        return response()->json([
            'data'          => $index,
            'statuscode'    => 200,
            'userId'        => auth()->user()->id
        ]);
    }

    public function upload()
    {
        $album = album::with('user')->where('id_users', auth()->user()->id)->get();
        return view('upload', compact('album'));
        // return view('upload');
    }

    public function upload_foto(Request $request)
    {
        //logika penyimpanan foto
        $filename = pathinfo($request->filefoto, PATHINFO_FILENAME);

        $extension = $request->filefoto->getClientOriginalExtension();
        $namafoto = 'foto' . time() . '.' . $extension;
        $request->filefoto->move('foto', $namafoto);

        $datasimpan = [
            'id_users' => auth()->user()->id,
            'id_album' => $request->nama_album,
            'judul_foto' => $request->judul_foto,
            'deskripsi_foto' => $request->deskripsi,
            'lokasi_file' => $namafoto
        ];
        foto::create($datasimpan);
        // Alert::success('Upload berhasil', 'anda telah berhasil Upload foto');
        return redirect('/index')->with('success', 'berhasil upload fotos');
    }

    public function tambah_album(Request $request)
    {
        $data = [
            'id_users' => auth()->user()->id,
            'nama_album' => $request->nama_album,
            'deskripsi' => $request->deskripsi
        ];

        album::create($data);
        return redirect('/upload');
    }

    //menampilkan halaman uploaded
    public function uploaded(){
        $datafoto = foto::with(['user', 'album'])->where('id_users', auth()->user()->id)->get();
        return view('uploaded', compact('datafoto'));
    }
    public function destroyFoto(Request $request, foto $foto)
    {

        if ($foto->id_users != auth()->user()->id) {
            return back()->with('error', 'Tidak diizinkan menghapus foto ini.');
        }



        // Lakukan penghapusan
        try {
            // Mulai transaksi database
            DB::beginTransaction();

            // Hapus data like terkait
            like::where('id_foto', $foto->id)->delete();

            // Hapus data komen
            comment::where('id_foto', $foto->id)->delete();

            // Hapus data foto dari database
            $foto->delete();

            // Commit transaksi jika semua operasi di atas berhasil
            DB::commit();

            return back()->with('success', 'Foto berhasil dihapus.');
        } catch (\Exception $e) {
            // Jika terjadi exception, rollback transaksi
            DB::rollback();
            return back()->with('error', 'Error saat menghapus foto: ' . $e->getMessage());
        }
    }
    public function edit_upload($id)
    {
        $albums = album::all();
        $foto = foto::where('id', $id)->first(); // Replace 1 with the actual ID or logic to find the appropriate foto
        return view('edit_upload', compact('foto', 'albums'));
    }
    public function updateFoto(Request $request, foto $foto)
    {
        // Validation logic if needed

        // Update the photo
        $foto->update([
            'judul_foto' => $request->judul_foto,
            'deskripsi' => $request->deskripsi,
            'album_id' => $request->album_id,
            // Update other fields as needed
        ]);

        return redirect('/index')->with('success', 'Photo updated successfully.');
    }
}
