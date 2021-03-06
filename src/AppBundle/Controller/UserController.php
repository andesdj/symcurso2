<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\JsonResponse;
use BackendBundle\Entity\User;
use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;
/**
 * Description of UserController
 *
 * @author nelson.montealegre
 */
class UserController extends Controller {

	//Crear y registrar usuarios
	public function newAction(Request $request) {
		//1 CARGAR SERVICIO HELPERS
		$helpers = $this->get("app.helpers");
		//Recibir datos  que nos llegan por POST en un JSON
		$json = $request->get("json", null);
		$params = json_decode($json);
		$data = array(
			"status" => "error",
			"code" => 400,
			"msg" => "user Not Created"
		);

		if ($json != null) {
			$createdAt = new \DateTime("now");
			$image = null;
			$roles = "user";

			$email = (isset($params->email)) ? $params->email : null;

			$name = (isset($params->name) && ctype_alpha($params->name)) ? $params->name : null;
			$surname = (isset($params->surname) && ctype_alpha($params->surname)) ? $params->surname : null;
			$password = (isset($params->password)) ? $params->password : null;

			//Cifrar Password
			$pwd = hash('sha256', $password);
			$emailConstraint = new Assert\Email();
			$emailConstraint->message = "This email is not valid!";
			$validate_email = $this->get("validator")->validate($email, $emailConstraint);

			// Validar email , que no devuelva error, que password no sea vacio, y que los nombres y apellidso contengan elementos.
			if ($email != null && count($validate_email) == 0 &&
					$password != null && $name != null && $surname != null) {

				$user = new User();
				$user->setCreatedAt($createdAt);
				$user->setEmail($email);
				$user->setImage($image);
				$user->setRoles($roles);
				$user->setName($name);
				$user->setSurname($surname);
				$user->setPassword($pwd);

				$em = $this->getDoctrine()->getManager();
				$isset_user = $em->getRepository("BackendBundle:User")->findBy(array("email" => $email));

				if (count($isset_user) == 0) {

					$em->persist($user);
					$em->flush();
					$data = array(
						"status" => "Success",
						"code" => 200,
						"msg" => "New User Created"
					);
				} else {
					$data = array(
						"status" => "error",
						"code" => 400,
						"msg" => "user Not Created, email Duplicated"
					);
				}
			}
		}

		return $helpers->json($data);
		//newAction
	}

	public function editAction(Request $request) {
		//1 CARGAR SERVICIO HELPERS
		$helpers = $this->get("app.helpers");
		$hash = $request->get("authorization", null);

		$authCheck = $helpers->authcheck($hash);

		if ($authCheck == true) {

			$identity = $helpers->authCheck($hash, true);

			$em = $this->getDoctrine()->getmanager();
			//Obtener usuario cuyo id =sub guardado en el objeto JSON **Aca se Obtiene el OBjeto USER, no se debe crear de nuevo
			$user = $em->getRepository("BackendBundle:User")->findOneBy(array(
				"id" => $identity->sub
			));

			//Recibir datos  que nos llegan por POST en un JSON
			$json = $request->get("json", null);
			$params = json_decode($json);
			$data = array(
				"status" => "error",
				"code" => 400,
				"msg" => "user Not updated"
			);

			if ($json != null) {
				$createdAt = new \DateTime("now");
				$image = null;
				$roles = "user";

				$email = (isset($params->email)) ? $params->email : null;

				$name = (isset($params->name) && ctype_alpha($params->name)) ? $params->name : null;
				$surname = (isset($params->surname) && ctype_alpha($params->surname)) ? $params->surname : null;
				$password = (isset($params->password)) ? $params->password : null;

				//Cifrar Password

				$emailConstraint = new Assert\Email();
				$emailConstraint->message = "This email is not valid!";
				$validate_email = $this->get("validator")->validate($email, $emailConstraint);

				// Validar email , que no devuelva error, que password no sea vacio, y que los nombres y apellidso contengan elementos.
				if ($email != null && count($validate_email) == 0 && $name != null && $surname != null) {
					//Como ya está creado el obnjeto user nio se crea de nuevo
//					$user = new User();
					$user->setCreatedAt($createdAt);
					$user->setEmail($email);
					$user->setImage($image);
					$user->setRoles($roles);
					$user->setName($name);
					$user->setSurname($surname);

					if ($password != null) {
						$pwd = hash('sha256', $password);
						$user->setPassword($pwd);
					}
				}
				$em = $this->getDoctrine()->getManager();
				$isset_user = $em->getRepository("BackendBundle:User")->findBy(array("email" => $email));

				if (count($isset_user) == 0 || $identity->email == $email) {

					$em->persist($user);
					$em->flush();
					$data = array(
						"status" => "Success",
						"code" => 200,
						"msg" => "User updated!"
					);
				} else {
					$data = array(
						"status" => "error",
						"code" => 400,
						"msg" => "user Not updated, email Duplicated"
					);
				}
			}


			return $helpers->json($data);
		} else {
			$data = array(
				"status" => "error",
				"code" => 400,
				"msg" => "Authorization Not Valid"
			);
		}
		//EditAction	
	}

	public function uploadImageAction(Request $request) {
		//Cargar los ervicios
		$helpers = $this->get("app.helpers");

		//Recibir por REQUEST EL token
		$hash = $request->get("authorization", null);
		//Validar si el token es valido
		$authCheck = $helpers->authCheck($hash);
		//Si es valido


		if ($authCheck) {


			$identity = $helpers->authCheck($hash, true);

			$em = $this->getDoctrine()->getManager();
			$user = $em->getRepository("BackendBundle:User")->findOneBy(array(
				"id" => $identity->sub
			));

			//upload file 
			$file = $request->files->get("image");

			if (!empty($file) && $file != null) {

				$ext = $file->guessExtension();


				if ($ext == "jpeg" || $ext == "png" || $ext == "gif") {
					$file_name = time() . "." . $ext;
					$file->move("uploads/users", $file_name);
					$user->setImage($file_name);

					$em->persist($user);
					$em->flush();


					$data = array(
						"status" => "success",
						"code" => 200,
						"msg" => "Image for user Uploaded Succes!!"
					);
				} else {
					$data = array(
						"status" => "error",
						"code" => 400,
						"msg" => "File format not Supported"
					);
				}
			} else {

				$data = array(
					"status" => "error",
					"code" => 400,
					"msg" => "Image  not updated"
				);
			}
		}
		//Nop es valido
		else {
			$data = array(
				"status" => "error",
				"code" => 400,
				"msg" => "Authorization Not valid  :("
			);
		}

		return $helpers->json($data);
		//uploadImageAction	
	}
	
	
	public function channelAction(Request $request,  $id=null){
			$helpers = $this->get("app.helpers");
		
			$em = $this->getDoctrine()->getManager();
			
			$user	=		$em->getRepository("BackendBundle:User")->findOneBy(array(
				"id"=>$id
			));
			//$video = $em->getRepository("BackendBundle:Video")->findAll();
			$dql= "SELECT v FROM BackendBundle:Video v  "
					. "WHERE v.user=$id "
					. "ORDER BY v.id DESC";
	
			$query=$em->createQuery($dql);
			$page=$request->query->getInt("page",	1);
			$paginator =	$this->get("knp_paginator");
			$items_pp=6;
			
			$pagination= $paginator->paginate($query,$page,$items_pp);
			$total_items=$pagination->getTotalItemCount();
			
			if(count($user)){
			$data=array(
				"status"=>"success",
				"total_items"=>$total_items,
				"page_actual"=>$page,
				"items_per_page"=>$items_pp,
				"total_pages"=>ceil($total_items/$items_pp),
			
			);
				$data["data"]["videos"]=$pagination;
				$data["data"]["user"]=$user;
				
			} else {
				$data = array(
				"status" => "error",
				"code" => 400,
				"msg" => "No data from this User ID"
			);
				
				
			}
			return $helpers->json($data);
	//Videos Action 	
	}
		
	

//FIN CLASS
}
