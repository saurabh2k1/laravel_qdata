<?php

namespace App\Http\Controllers;

use App\User;
use App\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function showAll()
    {
        $users = $this->user->with(['sites', 'studies'])->paginate(5);

        return view('admin.users', compact('users'))
            ->with('i', (request()->input('page', 1) -1) * 5);

    }
}
