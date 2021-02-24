<?php
namespace App\Repositories\ViewComposer;
use App\Repositories\Dashboard\DashboardRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Testimonial\TestimonialRepository;
use App\Repositories\Team\TeamRepository;
use App\Repositories\Project\ProjectRepository;
use App\Repositories\About\AboutRepository;
use App\Repositories\Setting\SettingRepository;
use App\Repositories\Category\CategoryRepository;
use Illuminate\View\View;
use DB;

class ViewComposer {
	private $dashboard;
	private $setting;
	
	
	public function __construct(DashboardRepository $dashboard,CategoryRepository $category, ProductRepository $product, TestimonialRepository $testimonial, SettingRepository $setting, TeamRepository $team, ProjectRepository $project, AboutRepository $about) {
		$this->dashboard=$dashboard;
		$this->product=$product;
		$this->testimonial=$testimonial;
		$this->setting=$setting;
		$this->team=$team;
		$this->about=$about;
		$this->project=$project;
		$this->category=$category;

	}
	public function compose(View $view) {
		$dashboard=$this->dashboard->first();
		// $page=$this->page->first();
		$setting=$this->setting->first();
		$about=$this->about->first();
		$product=$this->product->orderBy('created_at','desc')->take(5)->get();
		$project=$this->project->orderBy('created_at','desc')->get();
		$team=$this->team->orderBy('created_at','desc')->take(6)->get();
		$category=$this->category->orderBy('created_at','desc')->take(6)->get();
		$testimonial=$this->testimonial->orderBy('created_at', 'desc')->get();
		$view->with(['dashboard_composer'=>$dashboard,'dashboard_category'=>$category,'dashboard_setting'=>$setting,'dashboard_product'=>$product,'dashboard_project'=>$project,'dashboard_about'=>$about,'dashboard_team'=>$team, 'dashboard_testimonial'=>$dashboard]);
	}
	
}
