<?php
namespace App\Repositories\Project;
use App\Models\Project_case;
use App\Repositories\Crud\CrudRepository;
use Str;
class ProjectRepository extends CrudRepository implements ProjectInterface{
	public function __construct(Project_case $project){
		$this->model=$project;
	}
	public function create($input){
		$value=$input;
		// $value['slug']=!empty($input['slug'])? Str::slug($input['slug']) : Str::slug($input['title']);
		$this->model->create($value);
	}
	public function update($input,$id){
		$blog=$this->model->find($id);
		$value=$input;
		// if($value['slug']!==$blog['slug']){
		// 	$value['slug']=Str::slug($input['slug']);
		// }
		$this->model->find($id)->update($value);
	}
}