<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use Illuminate\Support\Facades\Http;

class StudentsController extends Controller
{
    protected $students;
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->students = new Students();
    }

    public function addStudent(){
        return view('pages.students.add');
    }

    public function index(){
        $response = Http::get('https://api.websl.lk/api/student');
        $students = $response->json();

        // Return the view with products data
        return view('pages.students.index', compact('students'));
    }

    public function save(Request $request){
        $response = Http::post('https://api.websl.lk/api/student', [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);

        return redirect('students');
        //dd($request);
    }

    public function edit($stu_id){
        $response = Http::get('https://api.websl.lk/api/student/'.$stu_id.'');
        $students = $response->json();

        //var_dump($students);
        return view('pages.students.edit',compact('students'));
    }

    public function update(Request $request, $stu_id){
        $response = Http::put('https://api.websl.lk/api/student/'.$stu_id.'', [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);

        return redirect('students');
    }


    public function delete($stu_id){
        $response = Http::delete('https://api.websl.lk/api/student/'.$stu_id.'');
        $students = $response->json();
        return redirect()->back();
        //var_dump($students);
        //return redirect('students');
    }
}
