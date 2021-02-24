<?php
namespace App\Repositories\About;
use App\Models\About;
use App\Repositories\Crud\CrudRepository;
use Str;
class AboutRepository extends CrudRepository implements AboutInterface{
	public function __construct(About $about){
		$this->model=$about;
	}
	public function create($input){
		$value=$input;
		// $value['slug']=!empty($input['slug'])? Str::slug($input['slug']) : Str::slug($input['title']);
		$this->model->create($value);
	}
	public function update($input,$id){
		$about=$this->model->find($id);
		$value=$input;
		// if($value['slug']!==$blog['slug']){
		// 	$value['slug']=Str::slug($input['slug']);
		// }
		$this->model->find($id)->update($value);
	}
}