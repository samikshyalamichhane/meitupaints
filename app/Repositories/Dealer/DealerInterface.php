<?php
namespace App\Repositories\Dealer;
use App\Repositories\Crud\CrudInterface;
interface DealerInterface extends CrudInterface{
	public function create($input);
	public function update($input,$id);
}