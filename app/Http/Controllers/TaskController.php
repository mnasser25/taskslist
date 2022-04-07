<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller {

    public function index(){
       // $tasks = [ 'task_1' => 'Make ur assignment',
       //            'task_2' => 'Check ur phone',
       //            'task_3' => 'Watch a movie'];

       //$tasks = DB :: table('tasks') ->where('name','like','%Task 1%')-> get(); //لو دعمل شرط للاستدعاء بستخدم  where 
       //$tasks = DB :: table('tasks') ->where('created_at','2022-04-05')-> get();
       $tasks = DB :: table('tasks') -> get();

        return view('tasks',compact('tasks'));
       
    }

    public function show($id){
        $task = DB::table('tasks') -> find($id) ;
        return view('show',compact('task'));
    }


    public function store(){
        DB::table ('tasks') -> insert(['name'=> $_POST['name']]);
        return redirect() -> back();

    }

  

}