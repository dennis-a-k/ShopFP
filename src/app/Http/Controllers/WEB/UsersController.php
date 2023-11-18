<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\RoleUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getUsers()
    {
        $users = User::where('role', 'user')->orderBy('name', 'ASC')->paginate(8);
        return view('pages.users.users', ['users' => $users]);
    }

    /**
     * Display a listing of the resource.
     */
    public function getAdmins()
    {
        $getCountAdmins = User::where('role', 'admin')->get()->count();
        $admins = User::whereIn('role', ['admin', 'moderator'])->orderBy('name', 'ASC')->paginate(8);
        return view('pages.users.admins', ['users' => $admins, 'count' => $getCountAdmins]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.users.add-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddUserRequest $request)
    {
        $user = $request->validated();
        dd($user);
        User::firstOrCreate($user);
        return back()->with('status', 'user-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUserRequest $request, string $id)
    {
        $data = $request->validated();
        User::where('id', $id)->update(['role' => $data['role']]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => ['required', 'string'],
        ]);

        User::find($request->id)->delete();
        return back();
    }
}
