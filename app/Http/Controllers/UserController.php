<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:t_users,email',
            'password' => 'required|min:6|confirmed',
            'level' => 'required|in:Admin,Pamekaran,Limusagung,Nanggeleng,Darawati,Mangunjaya,Cimaja,Cimanglid',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);

        Alert::success('Success', 'Account has been saved!');
        return redirect('/users');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:t_users,email,' . $user->id_user . ',id_user',
            'password' => 'nullable|min:6|confirmed',
            'level' => 'required|in:Admin,Pamekaran,Limusagung,Nanggeleng,Darawati,Mangunjaya,Cimaja,Cimanglid',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'level' => $request->level,
        ]);

        Alert::info('Success', 'Account has been updated!');
        return redirect('/users');
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            Alert::error('Success', 'Account has been deleted!');
            return redirect('/users');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant delete, Account is already used!');
            return redirect('/users');
        }
    }
}
