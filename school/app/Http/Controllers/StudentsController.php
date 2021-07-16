<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Student::paginate(15);
        
		return view('students', ['siswa'=> $siswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationRules = ['name'=> 'required|min:3', 'email' => 'required','shortdescription' => 'required|max:500'];
        $customMessages = ['name.required' => 'The :attribute field is diperlukan and more than 3 character', 'email.required' => 'Email is required', 'shortdescription' => 'Required and cannot be more than 500 chars'];
        $request -> validate($validationRules, $customMessages);


        $student = new Student;
        $student->name = $request->name;
        $student-> email = $request->email;
        if($request->shortdescription != "") {
            $student->short_description = $request->shortdescription;
        }
     
        $student->save();

        return redirect('/students')->with('pesan', "Berhasil, Berhasil ! Hore !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request -> id;
        $validationRules = ['name'=> 'required|min:3', 'email' => 'required','shortdescription' => 'required|max:500'];
        $customMessages = ['name.required' => 'The :attribute field is diperlukan and more than 3 character', 'email.required' => 'Email is required', 'shortdescription' => 'Required and cannot be more than 500 chars'];
        $request -> validate($validationRules, $customMessages);

        $studentUp = $request;
        Student::where('id', $id) -> update(['name' => $studentUp->name, 'email' => $studentUp -> email, 'short_description' => $studentUp->shortdescription]);
        return redirect("/students") -> with('pesan', "Data successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($student -> id );
        return redirect('/students')->with('pesan', 'Data berhasil dihapus!');
    }
}
