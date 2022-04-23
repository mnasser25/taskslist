<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
class TaskController extends Controller {

    public function index(){
        $tasks = Task :: all()->sortBy("name");
        //dd($tasks);
        return view('tasks',compact('tasks'));
       
    }

    public function show($id){
        $task = Task :: find($id);
        return view('show',compact('task'));
    }
//Insert task to database 

    public function store(Request $request){

       $task = new Task(); //بقوس أو دون صحيح 
       $task->name = $request->name;
       $task-> created_at = now();
       $task ->updated_at = now();
       $task -> save();

        return redirect() -> back();

    }
    // لأنو بعثتو في الراوت بقدر أستقبلو 
    public function delete($id){
        $task = Task :: find($id);
        $task -> delete();
        return redirect() -> back();
         
    }
  
      
    public function edit($id){
        $tasks = Task :: all()->sortBy("name");
        $task = Task :: find($id);

        return view('/tasks', compact('task', 'tasks'));
    }

    public function update(Request $request, $id){
        $task = Task :: where('id',$id)->update(['name' => $request->name]);
        return redirect('/');
    }
    

  

}