<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchResults(Request $request){

        $query = $request->get('query');

        if(!$query){
            return redirect()->route('home');
        }

        $users = User::where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'like', "%{$query}%")
                        ->orWhere('username', 'like', "%{$query}%")
                        ->get();
        return view('search.results')->with('users', $users);
    }
}
