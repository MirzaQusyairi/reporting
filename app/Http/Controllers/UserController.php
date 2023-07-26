<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role != 'administrator') {
            abort(403);
        }

        $data = User::where('email', '!=', 'admin@gmail.com ')->orderby('created_at', 'DESC')->get();

        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|min:3',
                'email' => 'required|email:dns|unique:users',
                'password' => 'required|min:8',
                //'password' => 'required|min:8|regex:/^(?=.[a-z])(?=.[A-Z])(?=.*\d).+$/',
                'role' => 'required',
            ]);

            $validatedData['password'] = Hash::make($validatedData['password']);
            $validatedData['status'] = 1;

            User::create($validatedData);

            return redirect('/user')->with('success_message', 'Pengguna berhasil ditambahkan!');
        } catch (ValidationException $e) {
            $errors = $e->errors();
            return redirect()->back()->withErrors($errors)->withInput()->with('error_modal_user', 'error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|min:3',
                'email' => [
                    'required',
                    'email:dns',
                    Rule::unique('users')->ignore($request->id)
                ],
                'role' => 'required',
            ]);

            if ($request->password) {
                $validatedData = $request->validate([
                    'password' => 'required|min:8',
                ]);

                $validatedData['password'] = Hash::make($validatedData['password']);
            }

            User::where('id', $request->id)
                ->update($validatedData);

            return redirect('/user')->with('success_message', 'Pengguna berhasil diubah!');
        } catch (ValidationException $e) {
            $errors = $e->errors();
            return redirect()->back()->withErrors($errors)->withInput()->with('error_modal_user_edit', $request->id);
        }
    }

    public function status($id)
    {
        $user = User::where('id', $id)->first();

        if ($user->status == 0) {
            $user = User::where('id', $id)->update([
                'status' => 1,
            ]);
        } else {
            $user = User::where('id', $id)->update([
                'status' => 0,
            ]);
        }

        return redirect('/user')->with('success_message', 'Status pengguna berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Report::where('user_id', $id)->exists()) {
            return redirect('/user')->with('error_message', 'Pengguna tidak dapat dihapus karena memiliki pelaporan!');
        } else {
            User::destroy($id);
        }

        return redirect('/user')->with('success_message', 'Pengguna berhasil dihapus!');
    }
}
