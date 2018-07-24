<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class taskController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
      $this->middleware('guest');
  }

  public function index(Request $request) {
      return view('tasks', [
        'tasks' => Task::orderBy('created_at', 'asc')->get()
      ]);
  }

  /**
   * Create a new task.
   *
   * @param  Request  $request
   * @return Response
   */
  public function store(Request $request) {
      $this->validate($request, [
          'name' => 'required|max:255',
      ]);

      $task = new Task;
      $task->name = $request->name;
      $task->save();

      return redirect('/');
  }

  /**
   * Destroy the given task.
   *
   * @param  Request  $request
   * @param  Task  $task
   * @return Response
   */
  public function destroy(Request $request, Task $task) {
      $task->delete();

      return redirect('/');
  }

}
