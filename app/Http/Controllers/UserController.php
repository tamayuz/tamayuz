<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $user_counter = $users->count();
        $admin_ids = Admin::all()->pluck('user_id');

        return view('user.index', [

            'users' => $users,
            'user_counter' => $user_counter,
            'admin_ids' => $admin_ids,

        ]);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($a, User $user)
    {
        $articles = $user->article;
        $project = $user->project;


        return view('user.show', [

            'user' => $user,
            'articles' => $articles,
            'project' => $project,

        ]);
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }


    public function makeAdmin($a, User $user)
    {
        $admin = new Admin();
        $admin->user_id = $user->id;
        $admin->save();


        return back();
    }


    public function destroy($a, User $user)
    {
        $user->delete();
        return back();
    }
}
