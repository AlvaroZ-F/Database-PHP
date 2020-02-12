<?php

	class UserValidator {
		private $data;
		private $errors = [];
		private static $fields = ['username', 'email', 'password'];
		/* Declaring class properties or methods as static makes them accessible without needing an instantiation of the class.*/

		public function __construct($post_data) {
			$this->data = $post_data;
		}

		public function validateForm() {
			
			foreach(self::$fields as $field) {
				if (!array_key_exists($field, $this->data)) { // Checks if the given key or index exists in the array
					trigger_error("$field is not present in data!");
					/* The trigger_error() function creates a user-defined error message. 
					The trigger_error() function is used to trigger an error message at a user-specified condition. 
					It can be used with the built-in error handler, or with a user defined function set by the 
					set_error_handler() function.
					*/
					return;
				}
			}

			$this->validateUsername();
			$this->validatePassword();
			$this->validateEmail();
			return $this->errors;

		}

		private function validateUsername() {
		
			$val = trim($this->data['username']);

			if(empty($val)) {
				$this->addError('username', 'Username cannot be empty');
			} else {
				if(preg_match('/^[a-zA-Z0-9]$/', $val)) { // preg_match — Perform a regular expression match
					$this->addError('username', "Username must be alphanumeric!");
				}
			}

		}

		private function validatePassword() {
		
			$val = trim($this->data['password']);

			if(empty($val)) {
				$this->addError('password', 'Password cannot be empty');
			} else {
				if(preg_match('/^[a-zA-Z0-9]{6-12}$/', $val)) {
					$this->addError('password', "Password must be alphanumeric or in between 6 and 12 characters");
				}
			}

		}

		private function validateEmail() {
		
			$val = trim($this->data['email']); // trim — Strip whitespace (or other characters) from the beginning and end of a string

			if(empty($val)) {
				$this->addError('email', 'Email cannot be empty');
			} else {
				if(!filter_var($val, FILTER_VALIDATE_EMAIL)) { // Filters a variable with a specified filter.
				// https://www.php.net/manual/en/filter.filters.validate.php
					$this->addError('email', "Invalid Email format");
				}
			}

		}

		private function addError($key, $val) {
			$this->errors[$key] = $val;
		}
	}
?>