<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Storage;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.profile");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image|required'
        ]);

        if($validator->fails()) {
            return response()->json(['message' => $validator->messages()->get('*')], 500);
        }

        $user = User::whereId(Auth::id())->firstOrFail();
        if(Auth::user()->profile_img) {
            Storage::delete('public/user/' . Auth::id() . '/image/profile/'. Auth::user()->profile_img);
        }

        Storage::disk('local')->putFileAs('public/user/' . Auth::id() . '/image/profile', $request->file('image'), $request->file('image')->hashName());
        $user->update([
            'profile_img' => $request->file('image')->hashName(),
        ]);

        return response()->json(['message' => 'updated'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'nullable|string|min:2',
            'last_name' => 'nullable|string|min:2',
            'address' => 'nullable|string|min:2|max:50',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('danger', 'Something Went Wrong! Please Check the Field...');
        }

        $user = User::whereId(Auth::id())->firstOrFail();
        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'address'=> $request->input('address'),
        ]);

        return redirect()->back()->with('message', 'Profile Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
