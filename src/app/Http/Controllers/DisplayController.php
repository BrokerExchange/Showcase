<?php

namespace Showcase\App\Http\Controllers;

use Showcase\App\Display;
use Showcase\App\Trophy;
use Illuminate\Http\Request;
use Showcase\App\Http\Requests\DisplayRequest;

class DisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('showcase::app.display.index', compact('displays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trophies = Trophy::all()->filter(function ($trophy) {
            return \Showcase\Showcase::templateFileExists($trophy->component_view, 'trophy');
        });

        return view('showcase::app.display.create', compact('trophies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Showcase\App\Http\Requests\DisplayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisplayRequest $request)
    {
        $request->merge(['force_trophy_default' => isset($request->force_trophy_default) ? true : false]);
        
        $display = Display::create($request->except('trophies'));

        $display->trophies()->detach();
        $display->trophies()->attach($request->trophies);

        return redirect()->route('displays.show', compact('display'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Showcase\App\Display  $display
     * @return \Illuminate\Http\Response
     */
    public function show(Display $display)
    {
        return view('showcase::app.display.show', compact('display'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Showcase\App\Display  $display
     * @return \Illuminate\Http\Response
     */
    public function edit(Display $display)
    {
        $trophies = Trophy::all();

        return view('showcase::app.display.edit', compact('display', 'trophies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Showcase\App\Http\Requests\DisplayRequest  $request
     * @param  \Showcase\App\Display  $display
     * @return \Illuminate\Http\Response
     */
    public function update(DisplayRequest $request, Display $display)
    {
        $request->merge(['force_trophy_default' => isset($request->force_trophy_default) ? true : false]);

        $display->update($request->except('trophies'));

        $display->trophies()->detach();
        $display->trophies()->attach($request->trophies);

        return redirect()->route('displays.show', compact('display'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Showcase\App\Display  $display
     * @return \Illuminate\Http\Response
     */
    public function destroy(Display $display)
    {
        $display->trophies()->detach();

        $display->delete();

        return redirect()->route('displays.index');
    }
}
