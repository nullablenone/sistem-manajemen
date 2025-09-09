<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class ManagementUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        return view('Users.index', compact('admins'));
    }

    public function createAkun()
    {
        return view('Users.register');
    }

    public function storeAkun(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->route('managementUsers.index',)->with('success', 'Berhasil Membuat Admin Baru');
    }

    public function destroy(string $id)
    {
        $model = User::find($id);
        $model->delete();
        return redirect()->route('managementUsers.index')->with('success', 'Data berhasil dihapus');
    }
}
