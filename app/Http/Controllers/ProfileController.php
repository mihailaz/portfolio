<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
	/**
	 * @var array
	 */
	protected $rules = [
		'name' => 'required|max:255',
		'email' => 'required|email|max:255',
		'phone' => 'sometimes|size:12',
		'password' => 'sometimes|confirmed|min:6',
		'image' => 'sometimes|image'
	];

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @return Response
     */
    public function edit(Request $request)
    {
        return view('profile', ['user' => $request->user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
	    $this->validate($request, $this->rules);
	    $user = $request->user();
	    $file = $request->file('image');

	    if ($file) {
		    $destination = implode('/', [public_path(), 'images']);
		    $image = uniqueFilename($destination, $file->getClientOriginalName(), $file->getClientOriginalExtension());
		    $file->move($destination, $image);

		    $user->image = implode('/', ['/images', $image]);
	    }

	    if ($user->email != $request->get('email') && User::all()->where('email', $request->get('email'))->first()){
		    return redirect()->back()->with('message', 'This email is not available')->with('message_level', 'error');
	    }

	    $user->name = $request->get('name');
	    $user->email = $request->get('email');
	    $user->phone = $request->get('phone');
	    if ($request->get('password')){
		    $user->password = bcrypt($request->get('password'));
	    }
	    $user->save();

	    return redirect()->back()->with('message', 'Profile success updated');
    }
}
