<?php
namespace App\Repositories\Category;
use App\Models\Category;
use App\Repositories\Crud\CrudRepository;
use Str;
class CategoryRepository extends CrudRepository implements CategoryInterface{
	public function __construct(Category $category){
		$this->model=$category;
	}
	public function create($input){
		$data=$input;
		// $value['slug']=!empty($input['slug'])? Str::slug($input['slug']) : Str::slug($input['title']);
		$this->model->create($data);
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