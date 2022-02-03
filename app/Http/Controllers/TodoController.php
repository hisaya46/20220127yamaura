<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()
    {
        $items = DB::table('items')->get();
        return view('index', ['items' => $items]);
    }
    public function create(Request $request)
    {
        $param = [
            'content' => $request->content,
        ];
        DB::insert('insert items set content =:content', $param);
        return redirect('/');
    }
    public function update(Request $request)
    {
        $param = [
            'content' => $request->content,
        ];
        DB::update('update items set content =:content', $param);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $param = DB::find($request->content);
        $param->delete();
        return redirect('/');
    }
}
