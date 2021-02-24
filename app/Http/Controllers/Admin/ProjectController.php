<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Project\ProjectRepository;
use Image;

class ProjectController extends Controller
{
    public function __construct(ProjectRepository $project){
        $this->project=$project;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details=$this->project->orderBy('created_at','desc')->get();
        return view('admin.project.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules());
        $value=$request->except('image','publish');
        $value['publish']=is_null($request->publish)? 0 : 1 ;
        if($request->image){
            $image=$this->imageProcessing($request->file('image'));
            $value['image']=$image;
        }
        
        
        $this->project->create($value);
        return redirect()->route('project_case.index')->with('message','Project Added Successfully');
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
        $detail=$this->project->find($id);
        return view('admin.project.edit',compact('detail'));   
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
        $old=$this->project->find($id);
        // $sameSlugVal = $old->slug == $request->slug ? true : false;
        // $this->validate($request, $this->rules($old->id,$sameSlugVal));
        $value=$request->except('image','publish');
        $value['publish']=is_null($request->publish)? 0 : 1 ;
        if($request->image){
            $image=$this->project->find($id);
            if($image->image){
                $thumbPath = public_path('images/thumbnail');
                $mainPath = public_path('images/main');
                $listingPath = public_path('images/listing');
                if((file_exists($thumbPath.'/'.$image->image)) && (file_exists($listingPath.'/'.$image->image)) &&(file_exists($mainPath.'/'.$image->image))){
                    unlink($thumbPath.'/'.$image->image);
                    unlink($mainPath.'/'.$image->image);
                    unlink($listingPath.'/'.$image->image);
                }
            }
            $image=$this->imageProcessing($request->file('image'));
            $value['image']=$image;
        }
        
        $this->project->update($value,$id);
        return redirect()->route('project_case.index')->with('message','Project Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=$this->project->find($id);
        if($image->image){
            $thumbPath = public_path('images/thumbnail');
            $mainPath = public_path('images/main');
            $listingPath = public_path('images/listing');
            if((file_exists($thumbPath.'/'.$image->image))  && (file_exists($listingPath.'/'.$image->image)) &&(file_exists($mainPath.'/'.$image->image))){
                unlink($thumbPath.'/'.$image->image);
                unlink($mainPath.'/'.$image->image);
                unlink($listingPath.'/'.$image->image);
            }
        }
        $this->project->destroy($id);
        return redirect()->route('project_case.index')->with('message','Project Deleted Successfully');
    }
    public function imageProcessing($image){
       $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
       $thumbPath = public_path('images/thumbnail');
       $mainPath = public_path('images/main');
       $listingPath = public_path('images/listing');
       
       $img1 = Image::make($image->getRealPath());
       $img1->fit(99, 88)->save($thumbPath.'/'.$input['imagename']);
       $img2 = Image::make($image->getRealPath());
       $img2->fit(370,320)->save($listingPath.'/'.$input['imagename']);
       $img3 = Image::make($image->getRealPath());
       $img3->fit(290,193)->save($mainPath.'/'.$input['imagename']);
       
      
       $destinationPath = public_path('/images');
       return $input['imagename'];  
      
       $destinationPath = public_path('/images');
       return $input['imagename'];     
    }
    public function rules($oldId = null, $sameSlugVal=false){

        $rules =  [
            'title' => 'required',
            'slug' => 'unique:blogs|max:255',
            'image'=>'mimes:jpeg,bmp,png'
            
        ];
        if($sameSlugVal){
            $rules['slug'] = 'unique:blogs,slug,'.$oldId.'|max:255';
        }
        return $rules;
    }
}
