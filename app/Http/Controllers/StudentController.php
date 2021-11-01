<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    // Get All Data From Database using Api
    public function Student()
    {
        try {
            $sutdent = Student::all();

            return response([

                'student' =>$sutdent,
                'message'=>'Data Fatch Success'
            ]);

        } catch (Throwable $th) {

            return response([

                'message' => $th->getMessage(),
            ]);
        }





    }
    // Insert Data using POST method


    public function insert(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'f_name' => 'required',
            'm_name' => 'required',
            's_image' => 'required'
        ]);

        if($validator->fails()){
            return response([
                'message' => $validator->errors()->all(),
            ]);
        }
        try {
            $sutdent = new Student();
            $sutdent->name    = $request->name;
            $sutdent->f_name  = $request->f_name;
            $sutdent->m_name  = $request->m_name;
            $sutdent->s_image = $request->s_image;
            $sutdent->save();

            return response([

                'Message'=>'Data Insert Success ',
                'data '=>$sutdent,
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' =>$th->getMessage(),
            ]);
        }
    }


    // Update Data using Api  And Validaton

    public function update(Request $request,$id)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'f_name' => 'required',
            'm_name' => 'required',
            's_image' => 'required'
        ]);

        if($validator->fails()){
            return response([
                'message' => $validator->errors()->all(),
            ]);
        }

        try {
            $sutdent = Student::findOrFail($id);
            $sutdent->name    = $request->name;
            $sutdent->f_name  = $request->f_name;
            $sutdent->m_name  = $request->m_name;
            $sutdent->s_image = $request->s_image;
            $sutdent->update();
            return response([
                'message' =>'Data Update Successfully',
                'sutdent' => $sutdent
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => $th->getMessage(),
            ]);
        }
    }


    public function delete($id)
    {
       
    }






}
