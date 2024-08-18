<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SepatuSendal;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sepatuSendal = SepatuSendal::get();
        return view('Dashboard.index', compact('sepatuSendal'));
    }

    public function createAkun()
    {
        return view('Dashboard.register');
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

        return redirect()->route('dashboard.index',)->with('success', 'Berhasil Membuat Admin Baru');
    }
}
