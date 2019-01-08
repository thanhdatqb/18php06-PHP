<?php 
	//	public, protected, private
	class User {
		var $name;
		var $email;
		var $password;
		var $phone;
		var $address;

		function __construct(){
		
		}
		private function addUser() {
			echo "Add";
		}
		public function editUser() {
			echo "Edit";
		}
		public function register() {
			echo "Register";
		}
		public function login() {
			echo "Login";
		}
		public function view() {
			echo "View";
		}
		private function listUser() {
			echo "List ";
		}
	}
	class Customer extends User{
		function __construct(){
		
		}
		function pay(){
			echo "pay";
		}
		function history(){
			echo "history";
		}
	}
	$user = new User();
	$user->view();
	$customer = new Customer();

?>