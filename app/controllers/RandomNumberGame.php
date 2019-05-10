<?php
namespace controllers;

 use Ubiquity\utils\http\USession;

 /**
 * Controller RandomNumberGame
 **/
class RandomNumberGame extends ControllerBase{
    const SESSION_KEY="random";
    
    
	public function index(){
	    if(USession::exists(self::SESSION_KEY)){
	        $this->propose();
	    }else{
		  $this->loadView("RandomNumberGame/index.html");
	    }
	}

	public function genere(){
	    $number=\mt_rand(1,10);
	    USession::set(self::SESSION_KEY, $number);
	    $this->index();
	}


	public function propose(){
		$this->loadView('RandomNumberGame/propose.html');
	}
	
	public function termine(){
	    USession::terminate();
	    $this->index();
	}

}
