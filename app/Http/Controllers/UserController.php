<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use League\Flysystem\UrlGeneration\PublicUrlGenerator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $users = User::all();
        return response(view('user.index', ['users' => $users]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response(view('user.create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $user = new User();
        $user->username = $validatedData['username'];
        $user->password = $validatedData['password']; 
        $user->role = $validatedData['role'];
        $user->save();

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        $user = User::findOrFail($id);
        return response(view('user.show', ['user' => $user]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        $user = User::findOrFail($id);
        return response(view('user.edit', ['user' => $user]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, string $id): RedirectResponse
    {
        $validatedData = $request->validated();

        // Ambil data user yang ada
        $user = User::findOrFail($id);

        // Perbarui hanya kolom yang diperlukan
        $user->username = $validatedData['username'];
        $user->password = $validatedData['password']; 
        $user->role = $validatedData['role'];
        $user->save();

        // Simpan perubahan
        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }

    /**
     * Handle user login.
     */
    public function login(Request $request): RedirectResponse
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Cari pengguna berdasarkan username
        $user = User::where('username', $username)->first();

        if (!$user) {
            return redirect()->back()->withInput()->with('error', 'Login failed. Invalid credentials.');
        }
        if ($password == $user->password) { 
            if ($user->role === 'customer') {
                $request-> session()->put('user_id', $user-> id);
                return redirect()->route('shared.home')->with('success', 'Logged in successfully.');
            } else {
                return redirect()->back()->with('error', 'Unauthorized access.');
            } 
        }
        return redirect()->back()->withInput()->with('error', 'Login failed. Invalid credentials.');
    }

    public function logout (Request $request)
    {
        $request->session()->forget('user_id');
        return redirect()->route('shared.home')->with('success', 'Logged out successfully.');
    }

}