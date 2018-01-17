<?php

namespace App\Http\Controllers;

use App\Model\Bunch;
use Illuminate\Http\Request;
use App\Model\Subscriber;
use App\Http\Requests\SubscriberRequest;
use Auth;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Bunch $bunch, Subscriber $subscriber)
    {
        $subscriber = Subscriber::latest()->where('bunches_id', $bunch->id)->owned()->get();
        return view('subscribers.index', compact('bunch','subscriber'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Bunch $bunch)
    {
        return view('subscribers.create', compact('bunch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Subscriber $subscriber, SubscriberRequest $request)
    {
        $subscriber->create($request->all());
        return redirect()->route('subscribers.index');
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
    public function edit(Bunch $bunch, $id)
    {
        $subscriber =Subscriber::findOrFail($id);
        return view('subscribers.edit', compact('bunch','subscriber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubscriberRequest $request, $id)
    {
        $subscriber =Subscriber::findOrFail($id);
        $subscriber->update($request->all());
        return redirect()->route('subscribers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriber =Subscriber::findOrFail($id);
        $subscriber ->delete();
        return redirect()->route('subscribers.index');
    }
}
