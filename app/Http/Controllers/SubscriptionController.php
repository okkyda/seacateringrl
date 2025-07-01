<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'phone'     => 'required|string|max:20',
            'plan'      => 'required|string',
            'mealType'  => 'required|array|min:1',
            'days'      => 'required|array|min:1',
            'allergies' => 'nullable|string|max:1000',
        ]);

        // Simpan sebagai string
        $validated['meal_type'] = implode(',', $validated['mealType']);
        $validated['days'] = implode(',', $validated['days']);

        Subscription::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'plan' => $validated['plan'],
            'meal_type' => $validated['meal_type'],
            'days' => $validated['days'],
            'allergies' => $validated['allergies'] ?? null,
            'active_until' => now()->addMonth(),
        ]);

        return redirect()->route('dashboard.user')->with('success', 'Berhasil subscribe!');
    }
}
