<?php

namespace App\Http\Controllers;

use App\Model\Subscriber;
use App\Model\Template;
use Illuminate\Http\Request;
use App\Model\Campaign;
use Auth;
use App\Http\Requests\CampaignRequest;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaign = Campaign::latest()->owned()->get();
        return view('campaign.index', compact('campaign'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('campaign.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Campaign $campaign, CampaignRequest $request)
    {
        $campaign->create($request->all());
        return redirect()->route('campaign.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        $subscriber = Subscriber::latest()->owned()->get();
        $template = Template::latest()->owned()->get();

        if ($campaign['created_id'] === Auth::user()->id) {
            return view('mail.show', compact('campaign', 'subscriber', 'template'));
        } else {
            echo 'Sorry, but you can not perform this action';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);
        if ($campaign['created_id'] === Auth::user()->id) {
            return view('campaign.edit', compact('campaign'));
        } else {
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
    public function update(CampaignRequest $request, $id)
    {
        $campaign =Campaign::findOrFail($id);
        $campaign->update($request->all());
        return redirect()->route('campaign.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $campaign =Campaign::findOrFail($id);
        $campaign->delete($request->all());
        return redirect()->route('campaign.index');
    }
}
