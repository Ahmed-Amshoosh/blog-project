<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{

    public function index(Request $request){
        $departs=Department::paginate(10);
        $word='';
        if($request->name){
            $departs=Department::where('name','LIKE','%'.$request->name.'%')->get();
            $word=$request->name;
        }
        if($request->search_head_depart){
            $departs=Department::where('head_depart','LIKE','%'.$request->search_head_depart.'%')->get();
            $word=$request->search_head_depart;

        }

        if($request->name && $request->search_head_depart){
            $departs=Department::where('name','LIKE','%'.$request->name.'%')
                ->where('head_depart','LIKE','%'.$request->search_head_depart.'%')
                ->get();

        }


        return view('admin.depart.index',compact('departs','word'));
    }

    public function add_department(){
        $doctors=Doctor::all();
        return view('admin.depart.add_depart',compact('doctors'));
    }
    public function create_department(Request $request){

        $request->validate([
            "name"=>'required',
            "head_depart"=>'required',
            "deprt_star_tdate"=>'required',

        ]);
        $depart=new Department();
        $depart->name=$request->name;
        $depart->head_depart=$request->head_depart;
        $depart->deprt_star_tdate=$request->deprt_star_tdate;
        $depart->save();

        return redirect(route('admin.departments'))->with('message','Create Department Successfully');
    }
    public function edit_department( $id){
        $depart=Department::find($id);
        return view('admin.depart.edit_depart',compact('depart'));
    }

    public function update_department(Request $request, $id){
        $request->validate([
            "name"=>'required',
            "head_depart"=>'required',
            "deprt_star_tdate"=>'required',

        ]);
        $depart=Department::find($id);
        $depart->name=$request->name;
        $depart->head_depart=$request->head_depart;
        $depart->deprt_star_tdate=$request->deprt_star_tdate;
        $depart->save();

        return redirect(route('admin.departments'))->with('message','Updated Department Successfully');
    }
    public function delete_department($id){
        $depart=Department::find($id);
        $depart->delete();


        return redirect()->back()->with('message','Deleted Department Successfully');

    }
}
