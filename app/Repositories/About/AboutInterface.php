<?php
namespace App\Repositories\About;
use App\Repositories\Crud\CrudInterface;
interface AboutInterface extends CrudInterface{
	public function create($input);
	public function update($input,$id);
}