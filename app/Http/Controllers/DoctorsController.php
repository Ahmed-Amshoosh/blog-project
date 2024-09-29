<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function index(Request $request){
        $doctors=Doctor::paginate(10);
        $word='';
        if($request->ser_by_name){
            $doctors=Doctor::where('name','LIKE','%'.$request->ser_by_name.'%')->get();
            $word=$request->ser_by_name;
        }
        if($request->ser_by_depar){
            $doctors=Doctor::where('department','LIKE','%'.$request->ser_by_depar.'%')->get();
            $word=$request->ser_by_depar;

        }

        if($request->ser_by_name && $request->ser_by_depar){
            $doctors=Doctor::where('name','LIKE','%'.$request->ser_by_name.'%')
                ->where('department','LIKE','%'.$request->ser_by_depar.'%')
                ->get();

        }




        return view('admin.doctor.index' , compact('doctors','word'));
    }
    public function add_doctor(){

        return view('admin.doctor.add_doctor');
    }

    public function create_doctor(Request $request ){

        $request->validate([
            "name"=>'required',
            "phone"=>'required',
            "address"=>'required',
            "age"=>'required',
            "image"=>'required',
            "gender"=>'required',
            "date_of_birth"=>'required',
            "joining_date"=>'required',
            "qualification"=>'required',
            "experience"=>'required',
            "department"=>'required',
            "username"=>'required',
            "cinform_password"=>'required',
            "ctiy"=>'required',
            "state"=>'required',
            "country"=>'required',
            "email"=>'required|unique:users',
            "password"=>'required|min:5',
        ]);


        $doctor=new Doctor();
        $user=new User();

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->address = $request->address;
        $doctor->age = $request->age;

        $doctor->gender = $request->gender;
        $doctor->date_of_birth = $request->date_of_birth;
        $doctor->joining_date = $request->joining_date;
        $doctor->qualification = $request->qualification;
        $doctor->experience = $request->experience;
        $doctor->department = $request->department;
        $doctor->desc = $request->desc;
        $doctor->ctiy = $request->ctiy;
        $doctor->state = $request->state;
        $doctor->country = $request->country;


            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/doctor'), $imageName);






        $doctor->image =$imageName;


        $doctor->save();

        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();



        return redirect()->back()->with('message','Create Doctor Successfully');



    }

    public function edit_doctor($id){
        $doctor=Doctor::find($id);

        return view('admin.doctor.edit_doctor' , compact('doctor'));
    }
    public function update_doctor(Request $request, $id){
        $doctor=Doctor::find($id);

        $request->validate([
            "name"=>'required',
            "phone"=>'required',
            "address"=>'required',
            "age"=>'required',
            "gender"=>'required',
            "date_of_birth"=>'required',
            "joining_date"=>'required',
            "qualification"=>'required',
            "experience"=>'required',
            "department"=>'required',
            "ctiy"=>'required',
            "state"=>'required',
            "country"=>'required',
        ]);




        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->address = $request->address;
        $doctor->age = $request->age;

        $doctor->gender = $request->gender;
        $doctor->date_of_birth = $request->date_of_birth;
        $doctor->joining_date = $request->joining_date;
        $doctor->qualification = $request->qualification;
        $doctor->experience = $request->experience;
        $doctor->department = $request->department;
        $doctor->desc = $request->desc;
        $doctor->ctiy = $request->ctiy;
        $doctor->state = $request->state;
        $doctor->country = $request->country;

        if(!$request->image == null){

            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/doctor'), $imageName);
            $doctor->image =$imageName;
        }

        $doctor->save();

        return redirect(route('admin.doctors'))->with('message','Update Doctor Successfully');
    }

    public function show_doctor($id){
        $doctor=Doctor::find($id);


        return view('admin.doctor.doctor_details',compact('doctor'));
    }
    public function delete_doctor($id){
        $doctor=Doctor::find($id);
        $doctor->delete();

        return redirect()->back()->with('message','Delete Doctor Successfully');
    }
}
