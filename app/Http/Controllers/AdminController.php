<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProspectiveStudent;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class AdminController extends Controller
{
    // Show a list of all prospective students
    public function index()
    {
        $students = Student::all();
        return view('admin.students.index', compact('students'));
    }

    // Show a specific prospective student's details
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.students.show', compact('student'));
    }

    public function myStudent()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.mystudent', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.mystudent')->with('success', 'User updated successfully.');
    }

    public function destroyuser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.mystudent')->with('success', 'User deleted successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->only(['registration_status'])); 
        return back()->with('success', 'Student registration status updated.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        if ($student->document_path) {
            Storage::delete($student->document_path);
        }
        $student->delete();
        return back()->with('success', 'Student record deleted.');
    }

}
