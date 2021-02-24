<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Dealer\DealerRepository;
use Image;

class DealerController extends Controller
{
    public function __construct(DealerRepository $dealer){
        $this->dealer=$dealer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details=$this->dealer->orderBy('created_at','desc')->get();

        return view('admin.dealer.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dealer.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            // $this->validate($request, $this->rules());
            $this->validate($request, [
                'email'    => 'required',
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                
            ]); 
            $value=$request->except('image','publish');
            $value['publish']=is_null($request->publish)? 0 : 1 ;
            if($request->image){
                $image=$this->imageProcessing($request->file('image'));
                $value['image']=$image;
            }
            // dd($value);
            
            
            $this->dealer->create($value);
            return redirect()->route('dealer.index')->with('message','Dealers Added Successfully');
        }
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
        $detail=$this->dealer->find($id);
        return view('admin.dealer.edit',compact('detail')); 
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
        $old=$this->dealer->find($id);
        $this->validate($request, [
            'email'    => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            
        ]); 
        $value=$request->except('image','publish');
        $value['publish']=is_null($request->publish)? 0 : 1 ;
        if($request->image){
            $image=$this->dealer->find($id);
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
       
        $this->dealer->update($value,$id);
        return redirect()->route('dealer.index')->with('message','Dealer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=$this->dealer->find($id);
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
        $this->dealer->destroy($id);
        return redirect()->route('dealer.index')->with('message','Dealer Deleted Successfully');
    }

    public function imageProcessing($image){
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $thumbPath = public_path('images/thumbnail');
        $mainPath = public_path('images/main');
        $listingPath = public_path('images/listing');
        
        $img1 = Image::make($image->getRealPath());
        $img1->save($mainPath.'/'.$input['imagename']);
        $img2 = Image::make($image->getRealPath());
        $img2->save($listingPath.'/'.$input['imagename']);
         $img1 = Image::make($image->getRealPath());
        $img1->fit(99, 88)->save($thumbPath.'/'.$input['imagename']);
        
       
        $destinationPath = public_path('/images');
        return $input['imagename'];  
       
        $destinationPath = public_path('/images');
        return $input['imagename'];     
     }
     public function rules($oldId = null, $sameSlugVal=false){
 
         $rules =  [
             'name' => 'required',
             'address' => 'required',
             'phone' => 'required',
             'email' => 'required|unique',
             
             'image'=>'mimes:jpeg,bmp,png'
             
         ];
        
         return $rules;
     }
}
