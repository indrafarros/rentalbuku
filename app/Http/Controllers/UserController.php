<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role_id', '2')->where('status', 'active')->get();
        return view('user', ['user' => $user]);
    }


    public function profile(Request $request)
    {
        return view('profile');
    }

    public function userRegistered()
    {
        $user = User::where('status', 'inactive')->where('role_id', '2')->get();
        return view('user-registered', ['user' => $user]);
    }

    public function userActivated($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();

        return redirect('users-registered')->with('status', 'Activated user successfuly');
    }

    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('user-detail', ['user' => $user]);
    }

    public function delete($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('user-block', ['user' => $user]);
    }

    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('/users')->with('status', 'User has been blocked');
    }

    public function blockedUser()
    {
        $user = User::onlyTrashed()->get();
        return view('users-blocked', ['user' => $user]);
    }

    public function unblockUser($slug)
    {
        $category = User::withTrashed()->where('slug', $slug)->first();
        $category->restore();

        return redirect('/user-blocked')->with('status', 'Category restore successfully');
    }
}
