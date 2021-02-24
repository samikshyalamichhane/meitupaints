<?php
namespace App\Repositories\Dealer;
use App\Models\Dealer;
use App\Repositories\Crud\CrudRepository;
use Str;
class DealerRepository extends CrudRepository implements DealerInterface{
	public function __construct(Dealer $dealer){
		$this->model=$dealer;
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