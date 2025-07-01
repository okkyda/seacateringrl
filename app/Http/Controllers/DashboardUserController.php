<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DashboardUser;
use Illuminate\Support\Facades\Auth;

class DashboardUserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profile = DashboardUser::firstOrCreate(['user_id' => $user->id], [
            'email' => $user->email,
            'phone' => '',
            'profile_picture' => null,
        ]);
        $subscription = \App\Models\Subscription::where('user_id', $user->id)
            ->where('active_until', '>=', now())
            ->latest()->first();

        // Kirim $subscription ke view
        return view('dashboarduser', compact('user', 'profile', 'subscription'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = DashboardUser::where('user_id', $user->id)->first();

        $request->validate([
            'phone' => 'nullable|string|max:20',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        $profile->phone = $request->phone;
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profiles', 'public');
            $profile->profile_picture = $path;
        }
        $profile->save();

        return redirect()->back()->with('success', 'Profile updated!');
    }
}
