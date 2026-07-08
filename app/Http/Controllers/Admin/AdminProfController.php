<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfRequest;
use App\Models\Categorie;
use App\Models\Prof;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminProfController extends Controller
{
    public function index()
    {
        $profs = Prof::with(['user', 'categorie'])->latest()->paginate(10);

        return view('admin.prof.index', compact('profs'));
    }

    public function create()
    {
        $categories = Categorie::all();

        return view('admin.prof.create', compact('categories'));
    }

    public function store(Request $request)
    {
        
    }
    
    public function destroy(Prof $prof)
    {
        $prof->user->delete(); // hamafa ilay prof koa 

        return redirect()->route('admin.prof.index')->with('success', 'Prof nofafana.');
    }
}
