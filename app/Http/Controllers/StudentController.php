<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function __invoke(){
        return view('dashboard', [
            'user' => auth()->user()
        ]);
    }
    public function dashboard(){
        return view('student.index', [
            'user' => auth()->user()
        ]);
    }
    public function getStudents(){
        $user = Auth::user(); 
        $students = Students::orderByDesc('created_at')->get();

        return view('dashboard', [
            'user' => $user,
            'students' => $students,
        ]);
    }

    public function getStudent($post){

    }

    public function create(){
        return view('create');
    }

    public function store(){
        $data = request()->validate([
            'idno' => ['required', 'string'],
            'name' => ['required', 'string'],
            'usertype' => ['required', 'string']
        ]);
    
        Students::create($data);
    
        return redirect('/dashboard')->with('status', 'Student added');
    }    

    public function edit($student){
        $student = Students::find($student);

        return view('edit', [
            'students' => $student
        ]);
    }

    public function update(Students $student){
        $data = request()->validate([
            'idno' => ['string'],
            'name' => ['string'],
            'usertype' => ['string']
        ]);

        $student->update($data);

        return redirect('/dashboard')->with('status', 'Student updated');
        // return redirect()->back()->with(['success' => 'Profile updated successfully.']);
    }

    public function delete(Students $student){
        $student->delete();

        return redirect('/dashboard')->with('status', 'Student deleted');
    }
}
