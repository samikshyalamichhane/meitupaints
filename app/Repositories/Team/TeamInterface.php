<?php
namespace App\Repositories\Team;
use App\Repositories\Crud\CrudInterface;
interface TeamInterface extends CrudInterface{
	public function create($input);
	public function update($input,$id);
}