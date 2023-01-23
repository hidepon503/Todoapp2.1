<?php

namespace App\Http\Controllers;
use App\Models\Todolist;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todolist = Todolist::all();
        $user = Auth::user();
        $tags = Tag::all();
        return view('index', ['todolists' => $todolist, 'user' => $user]);
    }

    public function create(ClientRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $form['user_id'] = Auth::id();
        $tags = Tag::all();
        Todolist::create($form);      
        return redirect('/',);
    }

    public function edit(ClientRequest $request)
    {
        $form = $request->all();
        $tags = Tag::all();
        $todolist = Todolist::find($request->id);
        unset($form['_token']);
        $form['user_id'] = Auth::id();
        Todolist::where('id', $request->id)->update($form);
        return redirect('/');
    } 

    public function delete(Request $request)
    {
        Todolist::find($request->id)->delete();
        return redirect('/');
    }

    public function find(Request $request)
    {
        $user = Auth::user();
        $tag = Tag::all();
        $todolist = Todolist::all();
        return view('/search', ['todolists' => $todolist]);
    }

    public function search(ClientRequest $request)
    {
        $user = Auth::user();
        $tag = Tag::all();
        $keyword = $request -> keyword;
        $tag_id = $request -> tag_id;
    }


}
