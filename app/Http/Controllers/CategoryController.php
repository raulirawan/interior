<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:categories,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('create', true);
        }

        $data = $validator->validated();
        $data['slug'] = Str::slug($data['name']);
        if (Category::create($data)) {
            Alert::success('Success', 'Data Has Successfully Saved');
            return redirect()->route('admin.categories.index');
        } else {
            Alert::error('Error', 'Data Has Failed Saved');
            return redirect()->route('admin.categories.index');
        }
    }

    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('edit', true);
        }

        $data = $validator->validated();

        $data['slug'] = Str::slug($data['name']);

        if ($category->update($data)) {
            Alert::success('Success', 'Data Has Successfully Updated');
            return redirect()->route('admin.categories.index');
        } else {
            Alert::error('Error', 'Data Has Failed Updated');
            return redirect()->route('admin.categories.index');
        }
    }

    public function delete(Category $category)
    {
        try {
            if ($category->delete()) {
                Alert::success('Success', 'Data Has Successfully Deleted');
                return redirect()->route('admin.categories.index');
            } else {
                Alert::error('Error', 'Data Has Failed Deleted');
                return redirect()->route('admin.categories.index');
            }
        } catch (\Throwable $th) {
            Log::error("Error Delete Categorys: " . $th);
            Alert::error('Error', 'Server Error, Try Again!');
            return redirect()->route('admin.categories.index');
        }
    }
}
