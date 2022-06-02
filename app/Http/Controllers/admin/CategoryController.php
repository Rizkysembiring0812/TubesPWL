<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(3);
        return view('admin.category.index')->with([
            'categories' => $categories
        ]);
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|unique:categories',
            'status' => 'required',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'status' => $request->status,
            'slug' => Str::slug($request->name),
            'image' => 'images/demo/' . $request->name . '.png'
        ]);

        Alert::toast('Kategori Berhasil Ditambahkan', 'success');
        return redirect(route('category.index'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit')->with([
            'category' => $category
        ]);
    }
    // {
    //     return view('admin.category.edit')->with([
    //         'parent_categories' => Category::parentCategories(),
    //         'category' => $category
    //     ]);
    // }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:3',
            'status' => 'required',
        ]);

        //parent_id must be available if the request data is not a parent 
        // if (is_null($request->is_parent) && is_null($request->parent_id)) {
        //     return redirect()->back()->withErrors(['parent_id' => 'Must have a parent_id selected']);
        // }

        try {
            $category->update([
                'name' => $request->name,
                'status' => $request->status,
                'slug' => Str::slug($request->name),
                'image' => 'images/demo/' . $request->name . '.png'
            ]);
        } catch (\Exception $e) {
            Alert::toast('Terjadi Kesalahan Saat Mengupdate Kategori');
            return redirect()->back();
        }
        Alert::toast('Kategori Berhasil di Update ', 'success');
        return redirect(route('category.index'));
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Alert::toast('Kategori Berhasil di Hapus', 'success');
        return redirect(route('category.index'));
    }
}
