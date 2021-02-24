<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Testimonial\TestimonialRepository;
use Image;

class TestimonialController extends Controller
{
    public function __construct(TestimonialRepository $testimonial){
        $this->testimonial=$testimonial;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details=$this->testimonial->orderBy('created_at','desc')->get();
        return view('admin.testimonial.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
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
        $this->testimonial->create($value);
        return redirect()->route('testimonial.index')->with('message','Testimonial Added Successfully');
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
        $detail=$this->testimonial->find($id);
        return view('admin.testimonial.edit',compact('detail'));
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
        $this->validate($request, $this->rules());
        $value=$request->except('image','publish');
            $value['publish']=is_null($request->publish)? 0 : 1 ;
            if($request->image){
                $image=$this->testimonial->find($id);
                if($image->image){
                    $thumbPath = public_path('images/thumbnail');
                    $listingPath = public_path('images/listing');
                    if((file_exists($thumbPath.'/'.$image->image)) && (file_exists($listingPath.'/'.$image->image))){
                        unlink($thumbPath.'/'.$image->image);
                        unlink($listingPath.'/'.$image->image);
                    }
                }
                $image=$this->imageProcessing($request->file('image'));
                $value['image']=$image;
            }
            $this->testimonial->update($value,$id);
            return redirect()->route('testimonial.index')->with('message','Testimonial Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=$this->testimonial->find($id);
        if($image->image){
            $thumbPath = public_path('images/thumbnail');
            $listingPath = public_path('images/listing');
            if((file_exists($thumbPath.'/'.$image->image)) && (file_exists($listingPath.'/'.$image->image))){
                unlink($thumbPath.'/'.$image->image);
                unlink($listingPath.'/'.$image->image);
            }
        }
        $this->testimonial->destroy($id);
        return redirect()->back()->with('message','testimonial Deleted Successfully');
    }
    public function imageProcessing($image){
       $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
       $thumbPath = public_path('images/thumbnail');
       $listingPath = public_path('images/listing');
       $img = Image::make($image->getRealPath());
       $img->fit(128,128)->save($thumbPath.'/'.$input['imagename']);
       $img2 = Image::make($image->getRealPath());
       $img2->fit(596,866)->save($listingPath.'/'.$input['imagename']);
      
       $destinationPath = public_path('/images');
       return $input['imagename'];     
    }
    public function rules($oldId = null, $sameSlugVal=false){
        $rules =  [
            'name' => 'required|max:100',
            'description' => 'required|max:250',
            
            'image'=>'mimes:jpeg,bmp,png'
        ];
        return $rules;
    }
}
