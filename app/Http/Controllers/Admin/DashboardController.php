<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\DashboardRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Testimonial\TestimonialRepository;
use App\Repositories\Project\ProjectRepository;
use App\Models\Subscription;
use App\Models\Contact;


class DashboardController extends Controller
{
    public function __construct(DashboardRepository $dashboard, ProductRepository $product, TestimonialRepository $testimonial, ProjectRepository $project ){
        $this->dashboard=$dashboard;
        $this->product=$product;
        $this->testimonial=$testimonial;
        $this->project=$project;


       

}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=$this->product->orderBy('updated_at','desc')->get();
        $subscribers=Subscription::orderBy('updated_at','desc');
        $testimonials=$this->testimonial->get();
        $projects = $this->project->orderBy('created_at','desc')->get();
        $contacts = Contact::orderBy('updated_at','desc')->take(5)->get();
        
        
        return view('admin.dashboard',compact('products', 'subscribers', 'testimonials', 'projects','contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        $this->validate($request,['meta_title'=>'max:250','num_banner_1'=>'integer|min:0','num_banner_2'=>'integer|min:0']);
        $data=$request->except('logo','fav_icon');
        if($request->fav_icon){
            $image=$request->file('fav_icon');
            $imageName = time().'.favicom'.$image->getClientOriginalExtension();

            $image->move(public_path('images/thumbnail'),$imageName);
            $data['fav_icon']=$imageName;
        }
        if($request->logo){
            $logo=$request->file('logo');
            $imageName = time().'.logo'.$logo->getClientOriginalExtension();
            $logo->move(public_path('images/thumbnail'),$imageName);
            $data['logo']=$imageName;
        }
        $this->dashboard->update($data,$id);
        return redirect()->back()->with('message','Dashboard Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
