<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\like;
use App\Models\User;
use App\Models\album;
use App\Models\comment;
use Illuminate\Http\Request;

class ExploreController extends Controller
{

    public function getdata(Request $request)
    {
        $explore = foto::with(['like'])->orderBy('id', 'DESC')->withCount(['like', 'comment'])->paginate();
        return response()->json([
            'data'      => $explore,
            'statuscode'    => 200,
            'idUser'    => auth()->user()->id
        ]);
    }

    public function getdatapostingku(Request $request)
    {
        // $explore = foto::with(['like'])->orderBy('id', 'DESC')->withCount(['like', 'comment'])->paginate();
        // return response()->json([
        //     'data'      => $explore,
        //     'statuscode'    => 200,
        //     'idUser'    => auth()->user()->id
        // ]);
        $postingku = auth()->user()->id;
        $explore = foto::with(['like', 'user'])->withCount(['like', 'comment'])->whereHas('user', function ($query) use ($postingku) {
            $query->where('id_users', $postingku);
        })->paginate(4);
        return response()->json([
            'data' => $explore,
            'statuscode' => 200,
            'idUser'    => auth()->user()->id
        ]);
    }




    public function like(Request $request)
    {
        try {
            $request->validate([
                'fotoid' => 'required'
            ]);

            $existingLike = like::where('id_foto', $request->fotoid)->where('id_users', auth()->user()->id)->first();
            if (!$existingLike) {
                $dataSimpan = [
                    'id_foto'       => $request->fotoid,
                    'id_users'       => auth()->user()->id
                ];
                like::create($dataSimpan);
            } else {
                like::where('id_foto', $request->fotoid)->where('id_users', auth()->user()->id)->delete();
            }

            return response()->json('Data Berhasil Di Simpan', 200);
        } catch (\Throwable $th) {
            return response()->json('Something went wrong', 500);
        }
    }


    public function getdatakomen(Request $request, $id)
    {
        $datakomen     =  foto::with('User')->where('id', $id)->firstOrFail();
        // $dataJumlahPengikut = DB::table('follows')->selectRaw('count(id_follow) as jmlfolow')->where('id_follow', $dataDetailFoto->user->id)->first();
        // $dataFollow = Follow::where('id_follow', $dataDetailFoto->user->id)->where('id_user', auth()->user()->id)->first();
        return response()->json([
            'datakomen' => $datakomen,
            //     'dataJumlahFollow'  => $dataJumlahPengikut,
            //     'dataUser'  => auth()->user()->id,
            //     'dataFollow'    => $dataFollow
        ]);
    }


    // public function kirimkomentar(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'fotoid'    => 'required',
    //             'isi_komentar'  => 'required'
    //         ]);
    //         $dataStoreKomentar = [
    //             'id_users'   => auth()->user()->id,
    //             'id_foto'   => $request->fotoid,
    //             'isi_komentar'  => $request->isi_komentar
    //         ];
    //         comment::create($dataStoreKomentar);
    //         return response()->json([
    //             'data'      => 'data berhasil disimpan'
    //         ], 200);
    //     } catch (\Throwable $th) {
    //         return response()->json('data gagal disimpan', 500);
    //     }
    // }
    //     public function kirimkomentar(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'fotoid'        => 'required',
    //             'isi_komentar'  => 'required'
    //         ]);
    //         $dataStoreKomentar = [
    //             'id_users'      => auth()->user()->id,
    //             'id_foto'       => $request->fotoid,
    //             'isi_komentar'  => $request->isi_komentar
    //         ];
    //         comment::create($dataStoreKomentar);
    //         return response()->json([
    //             'message' => 'Data berhasil disimpan'
    //         ], 200);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'message' => 'Data gagal disimpan'
    //         ], 500);
    //     }
    // }
    public function kirimkomentar(Request $request)
    {
        try {
            $request->validate([
                'idfoto'            => 'required',
                'isi_komentar'      => 'required',
            ]);

            $dataStoreKomentar = [
                'id_users'   => auth()->user()->id,
                'id_foto'   => $request->idfoto,
                'isi_komentar' => $request->isi_komentar
            ];
            comment::create($dataStoreKomentar);
            return response()->json([
                'data'      => 'Data berhasil disimpan'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json('data komentar gagal disimpan', 500);
        }
    }



    public function ambildatakomentar(Request $request, $id)
    {
        $ambilkomentar  = comment::with('user')->where('id_foto', $id)->get();
        return response()->json([
            'data'  => $ambilkomentar
        ]);
    }


    public function profile()
    {
        $tampilUpload = foto::with('album')->where('id_users', auth()->user()->id)->get();
        $tampilAlbum = album::with('foto')->where('id_users', auth()->user()->id)->get();
        return view('profile', compact('tampilAlbum', 'tampilUpload'));
    }
    public function show($id)
    {
        $album = album::with('foto')->findOrFail($id);
        return view('album', compact('album'));
    }

    public function detailcomment($id)
    {
        return view('detailcomment');
    }
}
