<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Hierarchy;
use DB;

class TableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function showTable() {

       $workers = DB::table('hierarchies')->paginate(30);
       return view('table',  ['workers' => $workers]);
   }

   public function searchTable(Request $request) {
       $value = $request->input('value');

       $workers = Hierarchy::where('id', 'like','%' . $value . '%')
                           ->orWhere('full_name', 'like',
                                    '%' . $value . '%')
                           ->orWhere('position', 'like',
                                    '%' .$value . '%')
                           ->orWhere('start_date', 'like',
                                     '%' . $value . '%')
                           ->orWhere('salary', 'like',
                                     '%' .$value . '%')
                           ->orWhere('id', 'like',
                                     '%' . $value . '%')
                           ->orderBy('id')->paginate(30);

       return view('table',  ['workers' => $workers]);
   }
}
