<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoListController extends Controller
{
    
    public function index(){
        return view('welcome',['listItems'=>ListItem::all()]);
    }

    public function markCompleted($id){
        $listItem = ListItem::find($id);
        $listItem->is_completed = 1;
        $listItem->save();

        return redirect('/');
    }

    public function markInCompleted($id){
        $listItem = ListItem::find($id);
        $listItem->is_completed = 0;
        $listItem->save();
        
        return redirect('/');
    }

    public function saveItem(Request $request){
        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_completed = 0;
        $newListItem->save();

        return redirect('/');
    }
}
