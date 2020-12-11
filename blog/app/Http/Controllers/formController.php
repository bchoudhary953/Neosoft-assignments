<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\form;
use Illuminate\Validation\ValidationException;

class formController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function save(Request $req)
    {
        //print_r($req->input());
        $form = new form;
        $form->first_name = $req->first_name;
        $form->last_name = $req->last_name;
        $form->status = $req->status;
        $form->role = $req->role;
        $form->save();
    }
    public function index(){
        return view('Backend.form');
    }

    public function store(StoreBlogPost $request)
    {
        // The incoming request is valid...

        // Retrieve the validated input data...
        $validated = $request->validated();
    }
}
