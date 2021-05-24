<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

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
        $items = User::get();

        return view('pengguna.pages.user.index', [
            'title' => 'Data User',
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.pages.user.create', [
            'title' => 'Tambah User',
        ]);
    }

    public function edit(User $user)
    {
        return view('pengguna.pages.user.edit', [
            'title' => 'Edit User ' . $user->name,
            'item' => $user
        ]);
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'username' => ['required', 'alpha_dash', Rule::unique('users', 'username')->ignore($user->id)],
            'email' => ['required', Rule::unique('users', 'email')->ignore($user->id)],
        ]);


        $data = $request->all();
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $user->password;
        }
        $user->update($data);

        return redirect()->route('data-user.index')->with('success', 'User berhasil diubah.');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'username' => ['required', 'alpha_dash', 'unique:users,username'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'min:8'],
            'level' => ['required', 'in:administrator,user'],
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->route('user.index')->with('success', 'User baru berhasil ditambahkan.');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */


    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */


    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(User $user)
    // {
    //     $user->delete();
    //     return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    // }
}
