<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wallet;
use App\Models\User;
use App\Models\BonusHistory;
use App\Models\VirtualAccount;

class DashboardController extends Controller
{
    public function index()
    {
        
        $user = Auth::user();
        $wallet = Wallet::where('user_id', $user->id)->first();

        $virtualAccount = VirtualAccount::where('user_id', $user->id)->first();
        $bonusHistory = BonusHistory::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard', compact('user', 'wallet', 'virtualAccount', 'bonusHistory'));
    }
}
