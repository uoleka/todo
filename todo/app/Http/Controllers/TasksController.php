<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return response($tasks, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'task_name'  => 'required',
            'description' => 'required',
            'location' => 'required',
            'date' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
              'message' => 'Invalid params passed', // the message to show
                'errors' => $validator->errors()
            ], 422);
        }
        $data = $validator->validated();
        $task = Task::create($data);
        return response($task, 200);
       
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $validator = validator::make($request->all(), [
            'task_name'  => 'required',
            'description' => 'required',
            'location' => 'required',
            'date' => 'required',
        ]);
        if ($validator->fails()) {
            return response([
              'message' => 'Invalid params passed', // the message to show
                'errors' => $validator->errors()
            ], 422);
        }
        $updateData = $validator->validated();
        $task = Task::where('id', $id)->update($updateData, $id);
        return response($task, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return response('Task deleted', 200);
    }
}
