<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Worker::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'city' => 'required',
            'email' => 'required|email|unique:workers',
            'picture' => 'string'
        ]);
        
        if ($validator->fails()){
            return response()->json($validator->errors(),422);
        }
     
        $worker = Worker::create($request->all());
        return response()->json($worker, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $worker = Worker::find($id);
        if(!$worker) {
            return response()->json(['message' => 'worker not found'], 404);
        }
        return $worker;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
           
            'email' => 'email|unique:workers'
            
        ]);

        $worker = Worker::find($id);
        if (!$worker){
            return response()->json(['message' => 'worker not found'], 404);
        }
        $worker->update($request->all());
        return response()->json($worker, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $worker = Worker::find($id);
        if (!$worker){
            return response()->json(['message' => 'worker not found'], 404);
        }
        $worker->delete();
        return response()->json(['message' => 'worker deleted successfully'], 200);
    }
}
