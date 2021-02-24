<?php
namespace App\Repositories\Team;
use App\Models\Team;
use App\Repositories\Crud\CrudRepository;
use Str;
class TeamRepository extends CrudRepository implements TeamInterface{
	public function __construct(Team $team){
		$this->model=$team;
	}
	public function create($input){
		$value=$input;
		// $value['slug']=!empty($input['slug'])? Str::slug($input['slug']) : Str::slug($input['title']);
		$this->model->create($value);
	}
	public function update($input,$id){
		$team=$this->model->find($id);
		$value=$input;
		
		$this->model->find($id)->update($value);
	}
}