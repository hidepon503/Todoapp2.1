<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Practice;
use App\Http\Requests\PracticeRequest;


class PracticeController extends Controller
{
    public function index()
    {
        $practices = Practice::all();
        return view('index', ['practices' =>$practices]);
    }

    public function create(PracticeRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Practice::create($form);
        return redirect('/');
    }

    public function edit(PracticeRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Practice::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        practice::find($request->id)->delete();
        return redirect('/');
    }

}
