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
        return view('dashboard.about.visi',compact('data'));
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


    public function spmi()
    {
        $path = Storage::disk('local')->get('public/spmi.json');
        $data = json_decode($path,true);
        return view('dashboard.about.spmi',compact('data'));
    }

    public function indexspmi(Request $request)
    {
        $path = Storage::disk('local')->get('public/spmi.json');
        $data = json_decode($path,true);
        return view('about.spmi',compact('data'));
    }

    public function addspmi(Request $request)
    {
        $path = Storage::disk('local')->get('public/spmi.json');
        $data = json_decode($path,true);

        $data['text'] = $request->content;

        try{
            $newJson = json_encode($data);
            Storage::disk('local')->put('public/spmi.json',$newJson);
            return redirect()->back()->with('success','Data Berhasil Diubah');
        }catch(\Throwable $th){
            throw $th;
        }
    }

    // AMI

    public function ami()
    {
        $path = Storage::disk('local')->get('public/ami.json');
        $data = json_decode($path,true);
        return view('dashboard.about.ami',compact('data'));
    }

    public function indexami(Request $request)
    {
        $path = Storage::disk('local')->get('public/ami.json');
        $data = json_decode($path,true);
        return view('about.ami',compact('data'));
    }

    public function addami(Request $request)
    {
        $path = Storage::disk('local')->get('public/ami.json');
        $data = json_decode($path,true);

        $data['text'] = $request->content;

        try{
            $newJson = json_encode($data);
            Storage::disk('local')->put('public/ami.json',$newJson);
            return redirect()->back()->with('success','Data Berhasil Diubah');
        }catch(\Throwable $th){
            throw $th;
        }
    }

    public function sambutan()
    {
        $path = Storage::disk('local')->get('public/sambutan.json');
        $data = json_decode($path,true);
        return view('dashboard.about.sambutan',compact('data'));
    }

    public function indexsambutan(Request $request)
    {
        $path = Storage::disk('local')->get('public/sambutan.json');
        $data = json_decode($path,true);
        return view('about.sambutan',compact('data'));
    }

    public function addsambutan(Request $request)
    {
        $path = Storage::disk('local')->get('public/sambutan.json');
        $data = json_decode($path,true);

        $data['text'] = $request->content;
        $data['name'] = $request->name;

        try{
            $newJson = json_encode($data);
            Storage::disk('local')->put('public/sambutan.json',$newJson);
            return redirect()->back()->with('success','Data Berhasil Diubah');
        }catch(\Throwable $th){
            throw $th;
        }
    }
}
