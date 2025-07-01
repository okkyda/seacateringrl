<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->input('start_date') ?? now()->startOfMonth()->toDateString();
        $end = $request->input('end_date') ?? now()->endOfMonth()->toDateString();

        // List data
        $newSubscriptionsList = Subscription::whereBetween('created_at', [$start, $end])->get();
        $mrrList = Subscription::where('active_until', '>=', now())
            ->whereBetween('created_at', [$start, $end])->get();
        $reactivationsList = Subscription::whereNotNull('reactivated_at')
            ->whereBetween('reactivated_at', [$start, $end])->get();
        $activeSubscriptionsList = Subscription::where('active_until', '>=', now())->get();

        // Summary data
        $newSubscriptions = $newSubscriptionsList->count();
        $mrr = $mrrList->sum('price'); // pastikan ada kolom 'price'
        $reactivations = $reactivationsList->count();
        $activeSubscriptions = $activeSubscriptionsList->count();

        return view('dashboard', compact(
            'newSubscriptions',
            'mrr',
            'reactivations',
            'activeSubscriptions',
            'newSubscriptionsList',
            'mrrList',
            'reactivationsList',
            'activeSubscriptionsList'
        ));
    }
}
