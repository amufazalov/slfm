<?php
namespace App\Controllers;
use App\Base\Controller;
use App\Base\Database;

class MainController extends Controller{
	
	public function index($request, $response, $args){
            
                $db = Database::connect();
                $data = $db->selectAll();
                
                print '<pre>';
                print_r($data);
            
		$a = 'Hello World!';

		return $this->container->view->render($response, 'home.phtml', [
	        'a' => $a
	    ]);
	    
	}
}
?>