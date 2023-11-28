<?php

namespace App\Http\Controllers;

use App\Models\Greeting;
use App\Models\InvitationWord;
use Illuminate\Http\Request;

class DashboardGreetingController extends Controller
{
    public function index()
    {
        return view('dashboard.greeting.index', [
            'greetings' => InvitationWord::paginate(10)
        ]);
    }

    public function create()
    {
        return view('dashboard.greeting.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'word' => 'required',
        ]);
        InvitationWord::create($validatedData);

        return redirect('/dashboard/greeting')->with('success', 'New Greeting has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Greeting  $greeting
     * @return \Illuminate\Http\Response
     */
    public function show(Greeting $greeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Greeting  $greeting
     * @return \Illuminate\Http\Response
     */
    public function edit(InvitationWord $greeting)
    {
        return view('dashboard.greeting.edit', [
            'greeting' => $greeting,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Greeting  $greeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvitationWord $greeting)
    {
        $rules = [
            'word' => 'required',
        ];

        $validatedData = $request->validate($rules);

        InvitationWord::where('id', $greeting->id)
            ->update($validatedData);

        return redirect('/dashboard/greeting')->with('success', 'New Greeting has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvitationWord  $greeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvitationWord $greeting)
    {

        InvitationWord::destroy($greeting->id);
        return redirect('/dashboard/greeting')->with('success', 'Greeting has been deleted');
    }
}
