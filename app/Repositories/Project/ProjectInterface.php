<?php
namespace App\Repositories\Project;
use App\Repositories\Crud\CrudInterface;
interface ProjectInterface extends CrudInterface{
	public function create($input);
	public function update($input,$id);
}