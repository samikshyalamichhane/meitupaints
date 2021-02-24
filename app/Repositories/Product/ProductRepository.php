<?php
namespace App\Repositories\Product;
use App\Models\Product;
use App\Repositories\Crud\CrudRepository;
use Str;
class ProductRepository extends CrudRepository implements ProductInterface{
	public function __construct(Product $product){
		$this->model=$product;
	}
	public function create($input){
		
		$value=$input;
		$value['slug']=!empty($input['slug'])? Str::slug($input['slug']) : Str::slug($input['title']);
		$this->model->create($value);
	}
	public function update($input,$id){
		$blog=$this->model->find($id);
		$value=$input;
		if($value['slug']!==$blog['slug']){
			$value['slug']=Str::slug($input['slug']);
		}
		$this->model->find($id)->update($value);
	}
}