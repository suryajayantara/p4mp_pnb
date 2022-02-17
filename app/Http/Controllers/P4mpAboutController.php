<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class P4mpAboutController extends Controller
{

    public function visimisi()
    {
        $path = Storage::disk('local')->get('public/visi_misi.json');
        $data = json_decode($path,true);
        return view('dashboard.about.visimisi.index',compact('data'));
    }

    public function indexvisimisi(Request $request)
    {
        $path = Storage::disk('local')->get('public/visi_misi.json');
        $data = json_decode($path,true);
        return view('about.visi_misi',compact('data'));
    }

    public function addvisimisi(Request $request)
    {
        $path = Storage::disk('local')->get('public/visi_misi.json');
        $data = json_decode($path,true);

        $data['text'] = $request->content;

        try{
            $newJson = json_encode($data);
            Storage::disk('local')->put('public/visi_misi.json',$newJson);
            return redirect()->back()->with('success','Data Berhasil Diubah');
        }catch(\Throwable $th){
            throw $th;
        }
    }
}
