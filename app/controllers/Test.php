<?php
namespace controllers;
 /**
 * Controller Test
 **/
class Test extends ControllerBase{

	public function index(){
		
	}

	public function message($value="Hello every body"){
		echo $value;
	}

}
