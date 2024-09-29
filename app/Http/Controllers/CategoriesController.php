<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{

    public function categories(Request $request)
    {

        $categories=Category::paginate(10);

        $word='';
        if($request->name){
            $categories = Category::where('name', 'LIKE', '%' . $request->name . '%')->paginate(10);

            $word=$request->name;
        }
        return view('admin/Category/all_categories',compact('categories','word'));
    }

    public function add_category()
    {
        return view('admin/Category/add_category');
    }
        public function create_category(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required|string|max:100',
            ]);
            DB::table('categories')->insert([
                'name' => $request->name,
            ]);

            return redirect(route('admin.categories'))->with('success', 'Data has been successfully saved!');
        }

        public function edit_category($id)
        {
            $category=Category::findOrFail($id);
            return view('admin/Category/edit_categroy',compact('category'));

        }


    public function update_category(Request $request ,$id)
    {
        DB::table('categories')
            ->where('id', $id)->update([
            'name' => $request->name,
        ]);
        return redirect(route('admin.categories'))->with('success', 'Data has been successfully Updated!');
    }

    public function delete_category($id)
    {
        $category=Category::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data has been successfully Deleted!');

    }


}

