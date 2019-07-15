<?php
namespace App\Http\Controllers;
use App\models\Commodity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\ImageManager;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Config;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commoditys = Commodity::all();
        return view('commodity.index', compact('commoditys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('commodity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file         = $request->file('headshot');
        $extension    = $file->getClientOriginalExtension();
        $file_name    = (string) Str::uuid().'.'.$extension;  //Synthesize new file name
        
        $path         = Storage::put($file_name, file_get_contents($file));

        $crop_x       = $request->x;
        $crop_y       = $request->y;
        $crop_w       = $request->w;
        $crop_h       = $request->h;
        $path_800x600 = storage_path("/app/public/800x600/".$file_name);
        $path_300x100 = storage_path("/app/public/300x100/".$file_name);

        $img_800x600 = Image::make($file);
        $img_800x600->crop($crop_w, $crop_h, $crop_x, $crop_y);
        $img_800x600->resize(800, 600);
        $img_800x600->save($path_800x600);
        
        $img_300x100 = Image::make($file);
        $img_300x100->crop($crop_w, $crop_h, $crop_x, $crop_y);
        $img_300x100->resize(300, 100);
        $img_300x100->save($path_300x100);

        Storage::delete($file_name);

        $data   = new commodity([
            'file_name'     => $file_name,
            'file_path'     => $path_800x600
        ]); 
       //$data->save();
        return redirect('/commodity')->with('success', 'company saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $img_url = Config::get('cms.img_url');
        $data    = Commodity::find($id);
        return view('commodity.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $file           = Input::file('headshot');
        $upload_path    = Config::get('cms.upload_path');
        $name           = Input::file('headshot')->getClientOriginalName();
        $extension      = Input::file('headshot')->getClientOriginalExtension();
        $file_name      = $name.'.'.$extension;
       
        if (Input::hasFile('headshot'))
            Input::file('headshot')->move($upload_path , $file_name);
        else 
            return redirect('/')->with('success', 'Error!!');

        $data           = Commodity::find($id);
        $data->cid      = $request->get('cid');
        $data->name     = $request->get('name');
        $data->tel      = $request->get('tel');
        $data->mail     = $request->get('mail');
        $data->brief    = $request->get('brief');
        $data->headshot = $file_name;
        $data->save();
        return redirect('/')->with('success', 'Company updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data   = Commodity::find($id);
        $data->delete();
        $cid    = Input::get('cid');
        return redirect('/')->with('success', 'Company deleted!');
    }
}
