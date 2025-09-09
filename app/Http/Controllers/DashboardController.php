<?php

namespace App\Http\Controllers;

use App\Models\Tas;
use App\Models\User;
use App\Models\ModelTas;
use App\Models\ProdukModel;
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
        $admin = User::where('role', 'admin')->get();
        $sepatuSendal = SepatuSendal::get();
        $modelSepatu = ProdukModel::get();
        $tas = Tas::get();
        $modelTas = ModelTas::get();
        return view('Dashboard.index', compact('admin', 'sepatuSendal', 'modelSepatu', 'tas', 'modelTas'));
    }

}
