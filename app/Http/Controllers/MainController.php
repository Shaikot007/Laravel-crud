<?php

namespace App\Http\Controllers;

use App\Models\Main;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class MainController extends Controller
{
    private $users;
    private $user;

    public function home()
    {
        return view('home');
    }

    public function user(Request $request)
    {
        Main::newMain($request);
        return redirect()->back()->with('message', 'User info save successfully.');
    }

    public function manage()
    {
        $this->users = Main::orderBy('id', 'desc')->get();
        return view('manage', ['users' => $this->users]);
    }

    public function edit($id)
    {
        $this->user = Main::find($id);
        return view('edit', ['user' => $this->user]);
    }

    public function update(Request $request)
    {
        Main::updateUser($request);
        return redirect('/manage')->with('message', 'User info updated.');
    }

    public function delete($id)
    {
        Main::deleteUser($id);
        return redirect('/manage')->with('message', 'User info deleted.');
    }
}
