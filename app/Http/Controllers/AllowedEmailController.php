<?php

namespace App\Http\Controllers;

use App\Models\AllowedEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AllowedEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allowed_users = AllowedEmail::all();
        $users = User::all();
        return view("admin.allowedemails", compact("allowed_users", "users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email|unique:users",
            // role teacher or student
            "role" => ['required', 'regex:/^(teacher|student)$/i']
        ]);

        $allowed_email = new AllowedEmail();
        $allowed_email->email = $request->email;
        $allowed_email->role = $request->role;
        $allowed_email->save();
        return redirect()->back()->with("msg", "email added successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(AllowedEmail $allowedEmail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $allowed_users = AllowedEmail::all();
        $users = User::all();
        $edit = AllowedEmail::find($id);
        return view("admin.allowedemails", compact("allowed_users", "users", "edit"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email", "role" => ['required', 'regex:/^(teacher|student)$/i']
        ]);

        $allowed_email =  AllowedEmail::find($id);

        if (AllowedEmail::where("email", $request->email)->exists()) {
            if ($request->email != $allowed_email->email) {
                $errors = ValidationException::withMessages([
                    'email' => 'Email already exists.',
                ]);
                throw $errors;
            }
        }

        $allowed_email->email = $request->email;
        $allowed_email->role = $request->role;
        $allowed_email->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = AllowedEmail::find($id);
        if (User::where("email", $data->email)->exists()) {
            $user = User::where("email", $data->email)->first();
            $user->status = 'inactive';
            $user->update();
        }
        $data->delete();
        return redirect()->back()->with("msg", "Data removed successfully.");
    }
}
