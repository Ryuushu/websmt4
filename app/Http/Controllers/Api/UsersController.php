<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function register(Request $request)
    {
        // Validate the incoming data
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|alpha_num|unique:users',  // Ensure username only has alphanumeric characters
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',  // Ensure unique email
            'password' => 'required|string|min:8|confirmed',  // Make sure passwords are confirmed
            'tgllahir' => 'required|date_format:Y-m-d',  // Ensure date is in 'YYYY-MM-DD' format
            'gender' => 'required|string|in:Laki-Laki,Perempuan',  // Ensure gender is one of the predefined options
            'nohp' => 'required|string|',  // Ensure phone number is valid with Indonesia format
            'alamat' => 'required|string|max:255',
        ]);

        // If validation fails, return errors
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Create the user
        $user = User::create([
            'username' => $request->username,  // Ensure to store username
            'fullname' => $request->fullname,  // Ensure to store fullname
            'email' => $request->email,  // Store email
            'password' => Hash::make($request->password),  // Hash and store password
            'tgllahir' => $request->tgllahir,  // Store tgllahir
            'gender' => $request->gender,  // Store gender
            'nohp' => $request->nohp,  // Store nohp
            'alamat' => $request->alamat,  // Store alamat
        ]);

        // Return success message
        return response()->json(['message' => 'User registered successfully.'], 201);
    }


    // Login and generate token
    public function auth(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);
    
        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
    
        // Mencari user berdasarkan email
        $user = User::where('email', $request->email)->first();
    
        // Jika user tidak ditemukan atau password tidak cocok
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
        // Membuat token untuk user
        $token = $user->createToken('makanapp')->plainTextToken;
    
        // Mengirimkan respons dengan token
        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user // Kamu bisa mengirimkan informasi user jika diperlukan
        ]);
    }
    public function logout(Request $request)
{
    // Menghapus token yang digunakan saat ini
    $request->user()->currentAccessToken()->delete();

    // Mengirimkan respons sukses
    return response()->json(['message' => 'Logout successful']);
}

    // Show user profile (protected route)
    public function profile(Request $request)
    {
        return response()->json($request->user());
    }
}
