<?php

namespace App\Http\Controllers;

use App\Events\PromoBroadcasted;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PromoController extends Controller
{
   public function broadcast(Request $request)
   {
      // Validasi input promo
      $validated = $request->validate([
         'title' => 'required|string|max:255',
         'description' => 'required|string',
         'discount' => 'required|numeric',
      ]);

      // Broadcast tanpa simpan ke database
      broadcast(new PromoBroadcasted($validated))->toOthers();

      return response()->json(['message' => 'Promo broadcasted successfully.']);
   }
}
