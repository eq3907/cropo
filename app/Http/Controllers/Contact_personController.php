<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\Contact_person;
use Illuminate\Support\Facades\Input;
use Config;

class Contact_personController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cid = Input::get('cid');
        $contact_persons = Contact_person::where('cid', $cid)->get();
        return view('contact_person.index', ['data'=> compact('contact_persons'),'cid'=>$cid]);
    }

    /**
     * Show the form for creating a new resource.
     *r
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cid = $request->get('cid');
        return view('contact_person.create', ['cid' => $cid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        
        $data   = new contact_person([
            'cid'      => $request->get('cid'),
            'name'     => $request->get('name'),
            'tel'      => $request->get('tel'),
            'fax'      => $request->get('fax'),
            'mail'     => $request->get('mail'),
            'brief'    => $request->get('brief'),
            'headshot' => $file_name
        ]);
        $data->save();
        //$cid    = Input::get('cid');
        //return redirect('/contact_person?cid='.$cid)->with('success', 'company saved!');
        return redirect('/')->with('success', 'company saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $data    = contact_person::find($id);
        return view('contact_person.edit', compact('data'));
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

        $data           = contact_person::find($id);
        $data->cid      = $request->get('cid');
        $data->name     = $request->get('name');
        $data->tel      = $request->get('tel');
        $data->mail     = $request->get('mail');
        $data->brief    = $request->get('brief');
        $data->headshot = $file_name;
        $data->save();
        //return redirect('/contact_person?cid='.$data->cid)->with('success', 'Company updated!');
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
        $data   = contact_person::find($id);
        $data->delete();
        $cid    = Input::get('cid');
        //return redirect('/contact_person?cid='.$cid)->with('success', 'Company deleted!');
        return redirect('/')->with('success', 'Company deleted!');
    }
}
