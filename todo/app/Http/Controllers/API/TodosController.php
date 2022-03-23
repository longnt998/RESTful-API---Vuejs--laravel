<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TodosCollection;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Todo::all();
        return TodosCollection::collection(Todo::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $todo = new Todo();
        // $todo->content = $request->content;
        // $todo->checked = $request->checked;
        // $todo->completed = $request->completed;
        // $todo->save();
        Todo::create($request->all());

        return TodosCollection::collection(Todo::all());
    }
    public function remove(Request $request)
    {
        Todo::find($request->id)->delete();

        return TodosCollection::collection(Todo::all());
    }
    public function removeall(Request $request)
    {

        foreach ($request->params as $param) {
            if ($param['checked'] == 1) {
                Todo::where('id', $param['id'])->delete();
            }
        }
        return TodosCollection::collection(Todo::all());
    }

    public function doneall(Request $request)
    {
        foreach ($request->params as $param) {
            if ($param['checked'] == 1) {
                Todo::where('id', $param['id'])->update(['completed' => 1]);
            }
        }
        return TodosCollection::collection(Todo::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
    }
}
