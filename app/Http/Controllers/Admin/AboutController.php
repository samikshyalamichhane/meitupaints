<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\About\AboutRepository;
use Image;

class AboutController extends Controller
{
    public function __construct(AboutRepository $about){
        $this->about=$about;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details=$this->about->orderBy('created_at','desc')->get();
        return view('admin.about.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,['dedicated_team_member'=>'integer|min:0','projects_completed'=>'integer|min:0','regular_users'=>'integer|min:0','awards'=>'integer|min:0']);
        $this->validate($request, $this->rules());
        $value=$request->except('image1','image2','publish');
        $value['publish']=is_null($request->publish)? 0 : 1 ;
        if($request->image1){
            $image=$this->imageProcessing($request->file('image1'));
            $value['image1']=$image;
        }
        if($request->image2){
            $image=$request->file('image2');
            $name= time().'.'.$image->getClientOriginalExtension();
            $mainPath = public_path('images/main');
            $img = Image::make($image->getRealPath());
            $img->fit(1349,395)->save($mainPath.'/'.$name);
            $value['image2']=$name;     
        }
        
        $this->about->create($value);
        return redirect()->route('about.index')->with('message','About Added Successfully');
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
        $detail=$this->about->find($id);
        return view('admin.about.edit',compact('detail'));   
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
        $old=$this->about->find($id);
        $this->validate($request,['dedicated_team_member'=>'integer|min:0','projects_completed'=>'integer|min:0','regular_users'=>'integer|min:0','awards'=>'integer|min:0']);
        $sameSlugVal = $old->slug == $request->slug ? true : false;
        $this->validate($request, $this->rules($old->id,$sameSlugVal));
        $value=$request->except('image','publish');
        $value['publish']=is_null($request->publish)? 0 : 1 ;
        if($request->image1){
            $image=$this->about->find($id);
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
            $image=$this->imageProcessing($request->file('image1'));
            $value['image1']=$image;
        }
        if($request->image2){
            $image=$request->file('image2');
            $name= time().'.'.$image->getClientOriginalExtension();
            $mainPath = public_path('images/main');
            $img = Image::make($image->getRealPath());
            $img->fit(722, 700)->save($mainPath.'/'.$name);
            $value['image2']=$name;     
        }
        $this->about->update($value,$id);
        return redirect()->route('about.index')->with('message','Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=$this->about->find($id);
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
        $this->about->destroy($id);
        return redirect()->route('about.index')->with('message','Blog Deleted Successfully');
    }
    public function imageProcessing($image){
       $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
       $thumbPath = public_path('images/thumbnail');
       $mainPath = public_path('images/main');
       $listingPath = public_path('images/listing');
       
       $img1 = Image::make($image->getRealPath());
       $img1->fit(620, 620)->save($thumbPath.'/'.$input['imagename']);
       $img2 = Image::make($image->getRealPath());
       $img2->fit(99, 88)->save($listingPath.'/'.$input['imagename']);
      
       $destinationPath = public_path('/images');
       return $input['imagename'];     
    }
    public function rules($oldId = null, $sameSlugVal=false){

        $rules =  [
            
            'image1'=>'mimes:jpeg,bmp,png',
            'image2'=>'mimes:jpeg,bmp,png'
            
        ];
        if($sameSlugVal){
            $rules['slug'] = 'unique:blogs,slug,'.$oldId.'|max:255';
        }
        return $rules;
    }
}
