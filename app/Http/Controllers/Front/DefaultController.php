<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Project_case;
use App\Models\Subscription;
use App\Models\Contact;
use App\Models\Category;
use App\Repositories\Testimonial\TestimonialRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Team\TeamRepository;
use App\Repositories\Project\ProjectRepository;
use App\Repositories\About\AboutRepository;
use App\Repositories\Page\PageRepository;
use App\Repositories\Dealer\DealerRepository;
use App\Repositories\Category\CategoryRepository;
use Mail;
use File;
use Redirect;


class DefaultController extends Controller
{
    public function __construct(CategoryRepository $category,ProductRepository $product, DealerRepository $dealer, TestimonialRepository $testimonial,TeamRepository $team, ProjectRepository $project,  PageRepository $page, AboutRepository $about){
		$this->product=$product;
		$this->testimonial=$testimonial;
		$this->project=$project;
		$this->page=$page;
        $this->team=$team;
		$this->about=$about;
		$this->dealer=$dealer;
		$this->category=$category;
        
        
	}

    public function index(){
          $category = Category::all();
        

        $testimonials=$this->testimonial->where('publish',1)->orderBy('created_at','desc')->take(5)->get();
            $about=$this->about->where('publish',1)->first();

        $products=$this->product->where('publish',1)->orderBy('created_at','desc')->take(6)->get();
        $projects=$this->project->where('publish',1)->orderBy('created_at','desc')->take(5)->get();
            return view('front.index',compact('testimonials','projects','products','about','category'));
        }
        
        

        public function about(){

            $about=$this->about->where('publish',1)->first();
            $team=$this->team->where('publish',1)->orderBy('created_at','desc')->take(6)->get();
            
            return view('front.about-us',compact('about','team'));
        }

       public function privacyPolicy(){
        
        
                return view('front.privacy-policy');
        
        
    }  
    
	 public function products(){
        $products=$this->product->where('publish',1)->orderBy('created_at','desc')->take(6)->get();
          return view('front.products',compact('products'));
        }
        
         public function productInner($category_slug, $pro_slug){
        //   $category = Category::categoryslug($category_slug)->first();
        //   dd($category->id);
          $product=$this->product->where('slug', $pro_slug)->first();

          if($product){
            $recentProducts= $this->product->orderBy('created_at','desc')->where('id','!=', $product->id)->where('publish',1)->take(4)->get();
            return view('front.product-details',compact('product','recentProducts'));
        }
    }

    public function productBySlug($catSlug){
        //   $category = Category::active()->where('slug',$slug)->first();
          $category = Category::active()->categoryslug($catSlug)->first();
        //   dd($category);
         
          $products = $this->product->where('category_id',$category->id)->get();
        //   dd($product);
        
        return view('front.category-products',compact('products', 'catSlug','category'));
        
    }

    public function productsList($slug){
        $product = $this->product->where('slug',$slug)->first();
        $recentProducts= $this->product->orderBy('created_at','desc')->where('id','!=', $product->id)->where('publish',1)->take(4)->get();
        return view('front.product-details',compact('product','recentProducts'));
    }
    

    public function projects(){
        
        $projects=$this->project->where('publish',1)->orderBy('created_at','desc')->take(6)->get();
        
        return view('front.project',compact('projects'));
        
        
    }

    public function contact(){
        return view('front.contact-us');
    }

    public function contactUs(Request $request){
        // dd($request);
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'subject'=>'required',
            'message_detail'=>'required']);
    $data= $request->except('_token');
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'subject'=>$request->subject,
            'message_detail'=>$request->message_detail];

            $contact =new Contact();
        $contact->fill($data);
        $contact->save();

        Mail::send('email.contactus', $data,function ($message) use ($data) {
                        $message->to('samikshya@webhousenepal.com')->from($data['email']);
                        $message->subject('Contact');
                       });
        return Redirect::back()->withErrors(['Thank you for contacting us', 'message']);
         // return redirect()->back()->with('message','Thank you for contacting us');
        
        
        
    }


     public function subscription(Request $request){
        $this->validate($request,[
            'email'=>'required|email|unique:subscriptions'
        ]);

        $data=['email'=>$request->email];

        $success= Subscription::create($data);
        return redirect()->back()->with('subscription_message','Thank you for contacting us');

    }

    public function buy(){
        $dealers=$this->dealer->where('publish',1)->orderBy('created_at','desc')->get();
        
        return view('front.dealer-list',compact('dealers'));


} 
}
