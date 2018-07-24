<?php

namespace App\Http\Controllers;

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
      return view('tasks');
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

      // Create The Task...
  }
}
