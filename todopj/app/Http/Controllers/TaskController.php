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
        return view('index', ['todolists' => $todolist, 'user' => $user, 'tags' => $tags]);
    }

    public function create(ClientRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $form['user_id'] = Auth::id();
        Todolist::create($form);      
        return redirect('/',);
    }

    public function edit(ClientRequest $request)
    {
        $form = $request->all();
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
        $tags = Tag::all();
        $keyword = $request -> input('keyword');
        $tag_id = $request -> input('tag_id');
        /*$user_id = $request -> input('user_id');
        検索にユーザーは含まれていないので不要 */
        $query = Todolist::query();
        $items = $query->get();
        
        return view('search', [ 'user' => $user, 'tags' => $tags,]);
    }

    
    public function search(ClientRequest $request)
    {
        $tags = Tag::all();
        $user = Auth::user();
        $keyword = $request -> input('keyword');
        $tag_id = $request -> input('tag_id');
        $user_id = $request -> input('user_id');
        $form['user_id'] = Auth::id();
        $query = Todolist::query();
        $query->join('tags', function ($query) use ($request){
            $query->on('todolists.tag_id','=', 'tags.id');
            });

        if(!empty($tag_id)){
            $query->where('tag_id', 'LIKE', $tag_id);
        }

        /*selectボックスなので下記が正解？*/

        /*if(!empty($user_id)){
            $query->where('user', 'LIKE', $user_id);
        }*/

        if(!empty($keyword)){
            $query->where(('todolists.name'), 'LIKE', "%{$keyword}%");
        }
        
        $items = $query->get();
        dd($query->get());
        
        return view('search', compact('items', 'keyword', 'tag_id', 'tags', 'user'));
    }


}
        