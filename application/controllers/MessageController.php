<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MessageController extends Controller
{
        // public function __construct()
        // {
        //         $this->middleware('auth');
        // }

        public function index(Request $request)
        {
                $users = User::where('id', '<>', $request->user()->id)->get();

                return view('chat', compact('users'));
        }
}
