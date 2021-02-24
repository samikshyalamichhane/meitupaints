<?php
namespace App\Repositories\Category;
use App\Repositories\Crud\CrudInterface;
interface CategoryInterface extends CrudInterface{
	public function create($input);
	public function update($input,$id);
}