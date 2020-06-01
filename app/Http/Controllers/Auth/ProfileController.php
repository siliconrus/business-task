<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $userID = Auth::user()->id;

        return view('auth.profile', [
            'profile' => User::find($userID)
        ]);
    }

    public function update(ProfileRequest $request)
    {
        $profile = User::find(Auth::user()->id);
        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        $file = $request->file('image');
        if(!empty($file))
        {
            $path = Storage::putFile('public/uploads', $file);
            $url = Storage::url($path);
            Storage::delete('public/uploads/'. substr($profile->image, 17));
            $profile->image = $url;
        }
        $profile->save();

        return redirect()->route('auth.profile')->with('success', 'Ваш профиль успешно обновлен!');
    }

    public function passwordChange(Request $request)
    {
        $request->validate([
            'current'               => 'required',
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        if(Hash::check($request->current, $request->user()->password))
        {
            $request->user()->update([
                'password' => Hash::make($request->input('password'))
            ]);

            Auth::logout();
            return redirect()->route('home');

        } else return redirect()->route('auth.profile')->withErrors(['current' => 'Неверно введен текущий пароль!']);
    }

}
