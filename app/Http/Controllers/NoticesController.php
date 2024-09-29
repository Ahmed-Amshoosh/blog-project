<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticesController extends Controller
{
    public function index(){
        $notices=Notice::paginate(10);
        return view('admin.notices.index',compact('notices'));
    }

    public function add_notice(){
        $notices=Notice::all();
        return view('admin.notices.add_notice',compact('notices'));
    }
    public function create_notices(Request $request){

        $request->validate([

            "notice"=>'required',
        ]);
        $notice=new Notice();
        $notice->user_create=auth()->user()->name;
        $notice->notice=$request->notice;
        $notice->save();

        return redirect(route('admin.notices'))->with('message','Create Notice Successfully');
    }
    public function edit_notice( $id){
        $notice=Notice::find($id);
        return view('admin.notices.edit_notice',compact('notice'));
    }

    public function update_notice(Request $request, $id){
        $request->validate([
            "notice"=>'required',
        ]);
        $notice=Notice::find($id);
        $notice->user_create=auth()->user()->name;
        $notice->notice=$request->notice;
        $notice->save();

        return redirect(route('admin.notices'))->with('message','Updated Notices Successfully');
    }
    public function delete_notice($id){
        $notice=Notice::find($id);
        $notice->delete();
        return redirect()->back()->with('message','Deleted Notice Successfully');

    }
}
