<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class ItemController extends Controller
{
    public function getIndex(Store $session) {
        $item = new Item();
        $items = $item->getItems($session);
        return view('onlineShop.index', ['items' => $items]);
    }

    public function getAdminIndex(Store $session) {
        $item = new Item();
        $items = $item->getItems($session);
        return view('admin.index', ['items' => $items]);
    }

    public function getItem(Store $session, $id) {
        $item = new Item();
        $item = $item->getItem($session, $id);
        return view('onlineShop.item', ['item' => $item]);
    }

    public function getAdminCreate() {
        return view('admin.create');
    }

    public function getAdminEdit(Store $session, $id) {
        $item = new Item();
        $item = $item->getItem($session, $id);
        return view('admin.edit', ['item' => $item, 'itemId' => $id]);
    }

    public function postAdminCreate(Store $session, Request $request) {
        $this->validate($request, [
            'name' => 'required|min:5',
            'detail' => 'required|min:10',
            'price' => 'required|min:5'
        ]);
        $item = new Item();
        $item->addPost($session, $request->input('name'), $request->input('detail'), $request->input('price'));
        return redirect()->route('admin.index')->with('info', 'Item created, Name is: ' . $request->input('name'));
    }

    public function postAdminUpdate(Store $session, Request $request) {
        $this->validate($request, [
            'name' => 'required|min:5',
            'detail' => 'required|min:10',
            'price' => 'required|min:5'
        ]);
        $item = new Item();
        $item->editPost($session, $request->input('id'), $request->input('name'), $request->input('detail'), $request->input('price'));
        return redirect()->route('admin.index')->with('info', 'Item edited, new Name is: ' . $request->input('name'));
    }
}
