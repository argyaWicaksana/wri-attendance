<?php

namespace App\Http\Controllers;

use \App\Http\Requests\MeetingsRequest;
use \App\Models\Meetings;
use \Illuminate\Http\Response;

class MeetingsController extends Controller {
        /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $datas = Meetings::all();
        return view('Meetings.index', compact([
            'datas' => $datas
        ]));
    }

    public function create()
    {
        return view('Meetings.create');
    }

    public function edit(Meetings $meeting)
    {
        return view('Meetings.edit',[
            'Meetings'=> $meeting
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(MeetingsRequest $request)
    {
        $data = $request->validated();
        Meetings::create($data);
        return redirect()->route('Meetings.index');
    }



    /**
     * Display the specified resource.
     *
     *
     */
    public function show(Meetings $meeting)
    {
        return view('Meetings.show', [
            'Meetings' => $meeting
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     */
    public function update(MeetingsRequest $request, Meetings $meeting)
    {
        $newData = $request->validated();
        $data = Meetings::where('id', $meeting->id)->update($newData);
        return redirect()->route('Meetings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(Meetings $meeting)
    {
        Meetings::destroy($meeting->id);
        return redirect()->route('Meetings.index');
    }
}
