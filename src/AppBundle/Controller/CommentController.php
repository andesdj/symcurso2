<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\JsonResponse;
use BackendBundle\Entity\User;
use BackendBundle\Entity\Video;
use BackendBundle\Entity\Comment;
use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;

class CommentController extends Controller {

	public function newAction(Request $request) {
		$helpers = $this->get("app.helpers");
		$hash = $request->get("authorization", null);
		$authCheck = $helpers->authCheck($hash);

		if ($authCheck) {

			$identity = $helpers->authCheck($hash, true);
			// null en caso que no exista
			$json = $request->get("json", null);


			if ($json != null) {

				$params = json_decode($json);

				$createdAt = new \Datetime('now');
				$user_id = (isset($identity->sub)) ? $identity->sub : null;
				$video_id = (isset($params->video_id)) ? $params->video_id : null;
			
				
				$body = (isset($params->body)) ? $params->body : null;
				 
					/*
				echo $video_id;
				echo "<br>";
				echo $body;
				die();
					 * 
				*/
				if ($user_id != null && $video_id != null) {

					$em = $this->getDoctrine()->getManager();
					
					$user=$em->getRepository("BackendBundle:User")->findOneby(array(
						"id"=>$user_id
					));
					
					$video=$em->getRepository("BackendBundle:Video")->findOneby(array(
						"id"=>$video_id
					));
					
					$comment	= new Comment();
					$comment	->setUser($user);
					$comment	->setVideo($video);
					$comment	->setBody($body);
					$comment	->setCreatedAt($createdAt);
					$em			->persist($comment);
					$em			->flush();

					
					$data = array(
						"status" => "success",
						"code"=>200,
						"msg"=>"Comment created Succesfully !",
						"data" => $comment
					);
					
					
				} else {

					$data = array(
						"status" => "error",
						"code" => 400,
						"msg" => "Comment, not Added. user or Video id not found". $video_id
							);
				}
			} else {

				$data = array(
					"status" => "error",
					"code" => 400,
					"msg" => "JSON Data load Failed"
						);
			}


		} else {

			$data = array(
				"status" => "error",
				"code" => 400,
				"msg" => "Autentication Failed"
					);
		}

		return $helpers->json($data);
		//Videos Action 	
	}

//FIN CLASS
}
