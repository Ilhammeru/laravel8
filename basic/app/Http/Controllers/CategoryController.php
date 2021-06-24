<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {
      // ORM METHOD
      // $categories = Category::all();

      // QUERY BUILDER METHOD
      $categories = DB::table('categories')
          ->get();
      return view('admin/category', compact('categories'));
    }

    public function add_category(Request $request) {
      $validated = $request->validate([
        'category'  => 'required'
      ],[
        'category.required' => 'Category cannot be null'
      ]);

      // ORM METHOD

      // $save = new Category;
      // $save->category_name = $request->category;
      // $save->user_id = Auth::user()->id;
      // $save->save();

      // QUERY BUILDER METHOD
      $data = [
        'category_name' => $request->category,
        'user_id'       => Auth::user()->id,
        'created_at'    => Carbon::now()
      ];

      DB::table('categories')->insert($data);

      return Redirect()->back()->with('success', 'Data successfully inserted');
    }
}
