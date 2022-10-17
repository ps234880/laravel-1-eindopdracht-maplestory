<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = Character::all();
        return view('index', ['character' => $characters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'in_game_name' => 'required|regex:/^[\pL\s]+$/u|min:4|max:15',
            'class' => 'required|regex:/^[\pL\s]+$/u|min:4|max:15',
            'level' => 'required|integer|min:1|max:300',
        ]);
        Character::create($request->only(['in_game_name', 'class', 'level']));
        return redirect('/characters');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $characters = Character::find($id);
        return view('characterdetails', ['character' => $characters]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $characters = Character::find($id);
        return view('edit', compact('characters'));
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
        $request->validate([
            'in_game_name' => 'required|regex:/^[\pL\s]+$/u|min:4|max:15',
            'class' => 'required|regex:/^[\pL\s]+$/u|min:4|max:15',
            'level' => 'required|integer|min:1|max:300',
        ]);
        Character::find($id)->update($request->only(['in_game_name', 'class', 'level']));
        return redirect('/characters')->with('success', 'Character updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Character::destroy($id);
        return redirect('/characters')->with('success', 'Character deleted.');
    }
}
