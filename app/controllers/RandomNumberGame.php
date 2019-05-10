<?php
namespace controllers;

 use Ubiquity\utils\http\USession;
use Ubiquity\utils\http\URequest;

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


	public function soumet(){
		$nbPropose=URequest::post('nbPropose');
		$nbATrouver=USession::get(self::SESSION_KEY);
		if($nbATrouver==$nbPropose){
		    $msgType="success";
		    $msg="Vous avez gagné !";
		    $icon="thumbs up";
		}else{
		    $msgType="error";
		    $msg="Le nombre proposé n'est pas le bon.";
		    $icon="thumbs down";
		}
		$this->loadView('RandomNumberGame/soumet.html',compact('msg','icon','msgType','nbPropose'));

	}

}
