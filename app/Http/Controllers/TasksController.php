<?php

namespace App\Http\Controllers;

use App\Filters\CategoryFilter;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

class TasksController extends Controller
{
    public function index()
    {

        $tasks = auth()->user()->tasks();

        $tasks = Task::paginate(2);
        return view('home', compact('tasks'));
        // return view('home')->with('tasks', $tasks);



    }
    public function add()
    {
    	return view('add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);
    	$task = new Task();
    	$task->description = $request->description;
    	$task->user_id = auth()->user()->id;
        $task->category_id = $request->category_id;
    	$task->save();
    	return redirect('/dashboard'); 
    }

    public function edit(Task $task)
    {

    	if (auth()->user()->id == $task->user_id)
        {            
                return view('edit', compact('task'));
        }           
        else {
             return redirect('/dashboard');
         }            	
    }

    public function update(Request $request, Task $task)
    {
    	if(isset($_POST['delete'])) {
    		$task->delete();
    		return redirect('/dashboard');
    	}
    	else
    	{
            $this->validate($request, [
                'description' => 'required'
            ]);
    		$task->description = $request->description;
	    	$task->save();
	    	return redirect('/dashboard'); 
    	}    	
    }
    public function search(Request $request)
    {
        $search = $request->input('search');

        $tasks = Task::query()
                    ->where('description', 'LIKE', "%{$search}%")
                    ->orWhere('category_id', 'LIKE', "%{$search}%")
                    ->get();


        return view('search', compact('tasks'));

        // $search_text = $_GET['query'];
        // $tasks = Task::where('description','LIKE','%'.$search_text.'%')->with('category')->get();
        // return view ('search',compact('tasks'));


        // $get_name = $request->search_name;
        // $tasks = Task::where('name','LIKE','%'.$get_name. '%')->get();
        // return view ('search',compact('tasks'));
    }


        public function categoriesList(CategoryFilter $request)
    {
        $tasks = Task::filter($request)->paginate(2);
        $categories = Category::all();

        return view('dashboard',compact(['tasks', 'categories' ]));
    }

}