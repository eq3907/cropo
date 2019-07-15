<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\Company;
use App\models\Contact_person;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companys = Company::all();
        return view('company.index', compact('companys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('company.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Company([
            'company_name' => $request->get('company_name'),
            'company_tel' => $request->get('company_tel'),
            'company_fax' => $request->get('company_fax'),
            'company_address' => $request->get('company_address'),
            'company_tax_id_number' => $request->get('company_tax_id_number'),
            'company_brief' => $request->get('company_brief')
        ]);
        $data->save();
        
        //return redirect('/company')->with('success', 'company saved!');
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
        $data = Company::find($id);
        return view('company.edit', compact('data'));
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
        $data = Company::find($id);
        $data->company_name =  $request->get('company_name');
        $data->company_tel = $request->get('company_tel');
        $data->company_fax = $request->get('company_fax');
        $data->company_address = $request->get('company_address');
        $data->company_tax_id_number = $request->get('company_tax_id_number');
        $data->company_brief = $request->get('company_brief');
        $data->save();
        //return redirect('/company')->with('success', 'Company updated!');
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
        $data = Company::find($id);
        $data->delete();

        $data   = contact_person::where('cid',$id);
        $data->delete();

        //return redirect('/company')->with('success', 'Company deleted!');
        return redirect('/')->with('success', 'Company deleted!');
    }
}
