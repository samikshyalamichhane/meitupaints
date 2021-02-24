<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepository;
use App\Models\Category;
use Auth;

class CategoryController extends Controller
{
    public function __construct(CategoryRepository $category){
        $this->category=$category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        // $categories = Category::active()->get();
        // dd($categories);
        return view('admin.category.list',compact('categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $category->slug = $request->slug;
        $data = $request->except('_token');
        $data['user_id']= Auth::user()->id;
        // dd($data['user_id']);
        // dd($data);
        
        $this->category->create($data);
        return redirect()->route('category.index')->with('message','Category Added Successfully');
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
        $categories = $this->category->FindOrFail($id);
        return view('admin.category.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $old=$this->category->find($id);
        $value=$request->except('_token');
        $value['user_id'] = Auth::user()->id;
        $this->category->update($value,$id);
        return redirect()->route('category.index')->with('message','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->category->FindOrFail($id);
        $this->category->destroy($id);
        return redirect()->route('category.index')->with('message','Category Deleted Successfully');
    }
}
