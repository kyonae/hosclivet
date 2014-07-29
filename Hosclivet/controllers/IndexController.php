<?php
class IndexController extends Controller{
	
	public function index(){
		$this->render("IndexView.php");
	}
	
	public function construction(){
		$this->render("ConstructionView.php");
	}
}