<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\artikel;

class artikelController extends Controller
{
    // artikel
    public function index()
    {
        $artikel = artikel::get();
        $artikel = artikel::latest()->paginate(5);
        return view('pengguna.pages.artikel.index', ['artikel' => $artikel], compact('artikel'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('pengguna.pages.artikel.create');
    }  

	public function upload(){
		$artikel = artikel::get();
		return view('pengguna.pages.artikel.index',['artikel' => $artikel]);
	}

	public function proses_upload(Request $request){
		$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'keterangan' => 'required',
            'judul' => 'required',
		]);

	
		$file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();

		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);

		artikel::create([
			'file' => $nama_file,
			'keterangan' => $request->keterangan,
            'judul' => $request->judul,
		]);

        return redirect()->route('article.index')->with('success', 'Artikel berhasil ditambahkan');
	}

    public function edit(artikel $artikel, $id)
    {
        $artikel = artikel::findorFail($id);
        return view('pengguna.pages.artikel.edit', [
            'title' => 'Edit Artikel ',
            'artikel' => $artikel
        ]);
    }

    public function update(Request $request, artikel $artikel, $id)
    {
        $artikel = artikel::findorFail($id);
        $request->validate([
            'judul' => 'required', 
            'keterangan' => 'required',
            'file' => 'required', 
        ]);
        
        $artikel->update($request->all());
        return redirect()->route('article.index')->with('success', 'Artikel berhasil diubah.');
    }

    public function destroy($id)
    {
        $artikel = artikel::findorFail($id);
        $artikel->delete();
        echo $artikel;
        return redirect()->route('article.index')->with('success', 'Artikel berhasil dihapus.');
    }

}
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\artikel  $artikel
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, artikel $artikel)
//     {
//         $request->validate([
//             'File' => 'required',
//             'Judul' => 'required',
//             'Keterangan' => 'required',
//         ]);
//         $artikel->update($request->all());
//         return redirect()->route('article.index')->with('success', 'FAQ berhasil di update');
//     }
//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\artikel  $artikel
//      * @return \Illuminate\Http\Response
//      */

//     public function destroy(artikel $artikel)
//     {
//         $artikel->delete();
//         return redirect()->route('article.index')->with('success', 'Artikel berhasil dihapus');
//     }
// }