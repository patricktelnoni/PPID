<?php
interface i_crud{
	//public $data;
	
	public function create($data);
	
	public function update($data);
	
	public function read();
	
	public function delete();
	
}