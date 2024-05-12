<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\player;
class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $player = player::all(); 
        return view('index1',compact('player')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('insert_player');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $player =   new player;
        $player -> name = $request->name;
        $player -> age = $request->age;
        $player -> national = $request->national;
        $player -> position = $request->position;
        $player -> salary = $request->salary;
        $player->save();
        return "thêm thành công";
        
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $player = player::where('id',$id)->get();
       
        
       

        return view('edit',compact('player'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $player = player::find($id);
        $player->name = $request->name;
        $player->age = $request->age;
        $player->national = $request->national;
        $player->position = $request->position;
        $player->salary = $request->salary;
        $player->save();
        return "update thành công";

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        player::where('id',$id)->delete();
        return redirect('/index1');
    }
}
