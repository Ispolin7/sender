<?php

namespace App\Http\Controllers;

use App\Http\Requests\BunchRequest;
use Illuminate\Http\Request;
use App\Model\Bunch;
use DB;
use Illuminate\Support\Facades\Auth;

class BunchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bunch = Bunch::latest()->owned()->get();
        return view('bunches.index', compact('bunch','subscriber'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bunches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Bunch $bunch, BunchRequest $request)
    {
        $bunch->create($request->all());
        return redirect()->route('bunches.index');
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
        $bunch=Bunch::findOrFail($id);
        if($bunch['created_id'] === Auth::user()->id){
            return view('bunches.edit', compact('bunch'));
        }
        else{
            echo 'Sorry, but you can not perform this action';
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BunchRequest $request, $id)
    {
        $bunch=Bunch::findOrFail($id);
        $bunch->update($request->all());
        return redirect()->route('bunches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subs=Bunch::findOrFail($id);
        $subs->delete();
        return redirect()->route('bunches.index');
    }
}
