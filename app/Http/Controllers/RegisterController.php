<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use APP\Resources\Viws\Item\add;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $item = new Item();
        $item->name = $request->name;
        $item->type = $request->type;
        $item->detail = $request->detail;
        $item->user_id = 1;

        $item->save();
         return redirect('/items');
    }
    public function destroy($id)
{
    $item = Item::find($id);
    
    if (!$item) {
        return redirect('/items')->with('error', '削除対象が見つかりませんでした。');
    }
    
    $item->delete();
    
    return redirect('/items')->with('success', '削除しました。');
}
}
