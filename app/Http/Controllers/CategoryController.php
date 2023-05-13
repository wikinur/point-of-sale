<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('pos.category.index', compact('categories'));
    }

    public function create()
    {
        return view('pos.category.create');
    }

    public function store(CategoryCreateRequest $request)
    {
        $category = Category::create($request->all());
        if ($category) {
            Session::flash('status', 'success');
            Session::flash('message', 'Tambah Data Berhasil');
        }
        return redirect('category');
    }

    public function edit(Category $category)
    {
        return view('pos.category.edit', compact('category'));
    }

    public function update(CategoryCreateRequest $request, Category $category)
    {
        $category->update($request->all());
        if ($category) {
            Session::flash('status', 'success');
            Session::flash('message', 'Ubah Data Berhasil');
        }
        return redirect('category');
    }

    public function destroy(Category $category)
    {
        $result = $category->delete();
        if ($result == 1) {
            Session::flash('status', 'success');
            Session::flash('message', 'Data berhasil dihapus');
            return redirect()->back();
        } else {
            Session::flash('gagal', 'error');
            Session::flash('message', 'Data gagal  dihapus');
            // return abort('500');
            return redirect()->back();
        }
    }
}
