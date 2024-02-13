<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\TDOMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TDOMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::get();
        return view('admin.tdomaster.create', compact('districts'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'district_id' => 'required',
               // 'teo_name' => 'required|regex:/^[\pL\s\-]+$/u|max:50'
            ]
        );
        if ($validate->fails()) {
            $messages = $validate->getMessageBag();
            return redirect()->back()->withErrors($validate);
        }

        $data = $request->all();


        TDOMaster::create([
            'district_id' => $data['district_id'],
            'name' => $data['name'],
            'type' =>$data['type'],
        ]);


        return redirect()->route('teo.index')

            ->with('success', 'TEO Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TDOMaster  $tDOMaster
     * @return \Illuminate\Http\Response
     */
    public function show(TDOMaster $tDOMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TDOMaster  $tDOMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(TDOMaster $tDOMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TDOMaster  $tDOMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TDOMaster $tDOMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TDOMaster  $tDOMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(TDOMaster $tDOMaster)
    {
       
    }
    public function fetchTDO(Request $request){
        $data['tdo'] = TDOMaster::where('district_id', $request->district_id)->where('deleted_at', null)->get();
        return response()->json($data);
    }

}
