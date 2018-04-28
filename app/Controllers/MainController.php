<?php
namespace App\Controllers;
use App\Base\Controller;

class MainController extends Controller{
	
	public function index($request, $response, $args){
		$a = 'Hello World!';
		
		return $this->container->view->render($response, 'home.phtml', [
	        'a' => $a
	    ]);
	    
	}
}
?>