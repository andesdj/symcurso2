<?php

namespace AppBundle\Services;

use Firebase\JWT\JWT;

class JwtAuth {

	public $manager;
	public $key; 
	
	public function __construct($manager) {
		$this->manager = $manager;
		$this->key="clave-secreta";
	}

	public function signup($email, $password, $getHash = NULL) {
		$key = $this->key;

		$user = $this->manager->getRepository('BackendBundle:User')->findOneBy(
				array("email" => $email,
					"password" => $password
				)
		);

		$singup = false;
		if (is_object($user)) {
			$singup = true;
		}

		if ($singup == true) {
			$token = array(
				"sub" => $user->getId(),
				"email" => $user->getEmail(),
				"name" => $user->getName(),
				"surname" => $user->getSurname(),
				"password" => $user->getPassword(),
				"Image" => $user->getImage(),
				"iat" => time(),
				"exp" => time() + ( 7 * 24 * 60 * 60)
			);
			$h = 'HS256';
			$jwt = JWT::encode($token, $key, $h);
			$decoded = JWT::decode($jwt, $key, array($h));

			if ($getHash != null) {
				return $jwt;
			} else {

				return $decoded;
			}
		} 
		else {
			return array("status" => "error", "data" => "Login Failed");
		}
	}

	
	
	public function checkToken($jwt, $getIdentity = false){
		$key = $this->key;
		$auth=false;
		$h = 'HS256';
		
		try {
			$decode=JWT::decode($jwt, $key, array($h));
		}
		
		//Excepciones
		catch(\UnexpectedValueException $e){
			
			$auth=false;
		}
		//Excepciones
		catch(\DomainException $e){
			
			$auth=false;
		}
		
		
		if(isset($decode->sub)){
			$auth=true;
		} else {
			$auth=false;
		}
		
		if($getIdentity==true){
			return $decode;
		} else {
			return $auth;
		}
		
	}
	
	
	
	
}
