<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\AdminUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request)
    {
        try {
            DB::beginTransaction();

            User::insert([
                [
                    'name' => $request->name,
                    'login' => $request->login,
                    'email' => $request->email,
                    'is_admin' => $request->is_admin ?? 0,
                    'password' => Hash::make($request->password),
                ],
            ]);

            DB::commit();
        } catch(Exception $e) {
            DB::rollback();

            throw $e;
        }

        return redirect()->route('users.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $user = User::find($id);

        return view('admin.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->login = $request->input('login');
        $user->email = $request->input('email');
        $file = $request->file('image');
        if(!empty($file))
        {
            $path = Storage::putFile('public/uploads', $file);
            $url = Storage::url($path);
            Storage::delete('public/uploads/'. substr($user->image, 17));
            $user->image = $url;
        }

        $user->save();

        return redirect()->route('users.store');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        User::destroy($id);

        return redirect()->route('users.index');
    }

}
