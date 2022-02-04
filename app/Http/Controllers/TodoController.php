<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('index', ['items' => $items]);
    }
    public function create(Request $request)
    {
        $this->validate($request, Item::$rules);
        $form = $request->all();
        Item::create($form);
        return redirect('/');
    }
    public function edit(Request $request)
    {
        $items = Item::find($request->id);
        return view('edit', ['form' => $items]);
    }
    public function update(Request $request)
    {
        $this->validate($request, Item::$rules);
        $form = $request->all();
        unset($form['_token']);
        Item::where('id', $request->id)->update($form);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $items = Item::find($request->id);
        return view('delete', ['form' => $items]);
    }
    public function remove(Request $request)
    {
        Item::find($request->id)->delete();
        return redirect('/');
    }
}
