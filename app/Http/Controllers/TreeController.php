<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Http\Response;


class TreeController extends Controller
{
    public function showTree() {

        $catalog = DB::select("SELECT * FROM hierarchies
              WHERE dir_id = 0 ORDER BY id");

        $catalog1 = DB::select("SELECT * FROM hierarchies
              WHERE dir_id = 1 ORDER BY id");

        $view = view('welcome');
        $view->withCatalog($catalog[0]);
        $view->withCatalog1($catalog1);

        return $view;
    }
    public function getTree(Request $request) {

        $id = $request->input('id');
        $catalog2 = DB::select("SELECT *
            FROM hierarchies WHERE dir_id = :id ORDER BY id", ['id' => $id]);
        $out = "<option value='0'>Выберите подчинённого</option>";
        foreach ($catalog2 as $key => $value) {
            $out .= "<option value='$value->id'>$value->id"." $value->position</option>";
        }
        return New Response($out);
    }
}
