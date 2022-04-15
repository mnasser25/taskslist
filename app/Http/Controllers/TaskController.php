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
       $tasks = DB :: table('tasks')->orderBy('name', 'asc') -> get();

        return view('tasks',compact('tasks'));
       
    }

    public function show($id){
        $task = DB::table('tasks') -> find($id) ;
        return view('show',compact('task'));
    }
//Insert task to database 

    public function store(Request $request){

       DB::table ('tasks') -> insert(['name'=> $_POST['name'],'created_at'=> now(),'updated_at'=> now()]);
  
        return redirect() -> back();

    }
    // لأنو بعثتو في الراوت بقدر أستقبلو 
    public function delete($id){
        DB:: table('tasks') -> where ('id','=',$id)-> delete();
        return redirect() -> back();
         
    }

      
    public function edit($id){
        $tasks = DB::table('tasks')->orderBy('name', 'asc')->get();
        $task = DB::table('tasks')->find($id);

        return view('/tasks', compact('task', 'tasks'));
    }

    public function update(Request $request, $id){
        $task = DB::table('tasks')->where('id',$id)->update([
            'name' => $request->name
        ]);

        return redirect('/');
    }
    

  

}