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

    public function markInCompleted($id, Request $request){
        
        if($request->input('action') === 'aprove' ){
            $listItem = ListItem::find($id);
            $listItem->is_completed = 0;
            $listItem->save();
        }else if($request->input('action') === 'delete' ){
                   $data = ListItem::find($id);
                   if($data){
                    $data->delete();
                    session()->flash('success','Deleted successfully.');
                   }else{
                    session()->flash('error','Data not found');
                   } 
        }
        return redirect('/');
    }

    public function saveItem($id,Request $request){
        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_completed = 0;
        $newListItem->save();
        if($request->input('action') === 'deny' ){

        }else if($request->input('action') === 'delte' ){
           $data = ListItem::find($id);
           if($data){
            $data->delete();
            session()->flash('success','Deleted successfully.');
           }else{
            session()->flash('error','Data not found');
           }             
        }
        return redirect('/');
    }
}
