<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\JsonResponse;
use BackendBundle\Entity\User;
use BackendBundle\Entity\Video;

class VideoController extends Controller {

	public function newAction(Request $request) {

//1 CARGAR SERVICIO HELPERS
		$helpers = $this->get("app.helpers");
		$hash = $request->get("authorization", null);

		$authCheck = $helpers->authcheck($hash);

		if ($authCheck == true) {
			$identity = $helpers->authCheck($hash, true);

			$json = $request->get("json", null);

			if ($json != null) {
				$params = json_decode($json);

				$createdAt = new \Datetime('now');
				$updatedAt = new \Datetime('now');

				$imagen = null;
				$video_path = null;
				$userId = ($identity->sub != null) ? $identity->sub : null;
				$title = (isset($params->title)) ? $params->title : null;
				$description = (isset($params->description)) ? $params->description : null;
				$status = (isset($params->status)) ? $params->status : null;

				if ($userId != null && $title != null) {
					$em = $this->getDoctrine()->getManager();

					$user = $em->getRepository("BackendBundle:User")->findOneBy(
							array(
								"id" => $userId
					));
//Crear objeto Video de la clase Video que maneja la tabla Video de la DB
					$video = new Video();
					$video->setUser($user);
//Asignar valores al objeto video
					$video->setTitle($title);
					$video->setDescription($description);
					$video->setStatus($status);
					$video->setCreatedAt($createdAt);
					$video->setUpdatedAt($updatedAt);

					$em->persist($video);
					$em->flush();

					$video = $em->getRepository("BackendBundle:Video")->findOneBy(array(
						"user" => $user,
						"title" => $title,
						"status" => $status,
						"createdAt" => $createdAt
					));

					$data = array(
						"status" => "success",
						"code" => 200,
						"data" => $video
					);
				} else {
					$data = array(
						"status" => "error",
						"code" => 400,
						"msg" => "Video not Created"
					);
				}
			}
		} else {

			$data = array(
				"status" => "error",
				"code" => 400,
				"msg" => "Video not uploaded, params failed"
			);
		}

		return $helpers->json($data);
//new Action	
	}

	public function editAction(Request $request, $id) {
		$video_id = $id;
//1 CARGAR SERVICIO HELPERS
		$helpers = $this->get("app.helpers");
		$hash = $request->get("authorization", null);

		$authCheck = $helpers->authcheck($hash);

		if ($authCheck == true) {
			$identity = $helpers->authCheck($hash, true);

			$json = $request->get("json", null);

			if ($json != null) {
				$params = json_decode($json);

				$createdAt = new \Datetime('now');
				$updatedAt = new \Datetime('now');

				$imagen = null;
				$video_path = null;
				$userId = ($identity->sub != null) ? $identity->sub : null;
				$title = (isset($params->title)) ? $params->title : null;
				$description = (isset($params->description)) ? $params->description : null;
				$status = (isset($params->status)) ? $params->status : null;

				if ($userId != null && $title != null) {
					$em = $this->getDoctrine()->getManager();

					$video = $em->getRepository("BackendBundle:Video")->findOneBy(
							array(
								"id" => $id
					));
//NO se crea nuevo objeto Video ()
//Asignar valores al objeto video
					if (isset($identity->sub) && ($identity->sub == $video->getUser()->getId())) {

						$video->setTitle($title);
						$video->setDescription($description);
						$video->setStatus($status);
						$video->setCreatedAt($createdAt);
						$video->setUpdatedAt($updatedAt);

						$em->persist($video);
						$em->flush();


						$data = array(
							"status" => "success",
							"code" => 200,
							"msg" => "Video Edited"
						);
					} else {
						$data = array(
							"status" => "error",
							"code" => 400,
							"msg" => "Video not Edited, You are not th Owner of this Video"
						);
					}
				} else {
					$data = array(
						"status" => "error",
						"code" => 400,
						"msg" => "Video not Edited"
					);
				}
			}
		} else {

			$data = array(
				"status" => "error",
				"code" => 400,
				"msg" => "Video not Edited, Authorization Failed"
			);
		}
		return $helpers->json($data);
//Edit Action	
	}

	public function uploadAction(Request $request, $id) {

		$video_id = $id;
		//1 CARGAR SERVICIO HELPERS
		$helpers = $this->get("app.helpers");
		$hash = $request->get("authorization", null);
		$authCheck = $helpers->authcheck($hash);

		if ($authCheck == true) {
			$identity = $helpers->authCheck($hash, true);

			$video_id = $id;
			$em = $this->getDoctrine()->getManager();
			$video = $em->getRepository("BackendBundle:Video")->findOneby(array(
				"id" => $video_id
			));

			if (($video_id != null ) && isset($identity->sub) && ($identity->sub == $video->getUser()->getId())) {

				$file = $request->files->get('image', null);
				$file_video = $request->files->get('video', null);


				if ($file != null && !empty($file)) {
					$ext = $file->guessExtension();

					if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
						$file_name = time() . "." . $ext;
						$path = "uploads/video_images/video_" . $video_id;
						$file->move($path, $file_name);
						$video->setImage($file_name);

						$em->persist($video);
						$em->flush();

						$data = array(
							"status" => "success",
							"code" => 100,
							"msg" => "Image file uploaded"
						);
					} else {

						$data = array(
							"status" => "error",
							"code" => 400,
							"msg" => "Image not uploaded, Format not supported"
						);
					}
					//Is a Image not empty.. else upload video
				} else {

					if ($file_video != null && !empty($file_video)) {
						$ext = $file_video->guessExtension();


						if ($ext == "mp4" || $ext == "avi") {
							$file_name = time() . "." . $ext;
							$path = "uploads/video_files/video_" . $video_id;
							$file_video->move($path, $file_name);
							$video->setVideoPath($file_name);

							$em->persist($video);
							$em->flush();

							$data = array(
								"status" => "success",
								"code" => 100,
								"msg" => "Video file uploaded"
							);
						} else {
							$data = array(
								"status" => "error",
								"code" => 400,
								"msg" => "Video not uploaded, Format not supported"
							);
						}
						//File Video Empty	
					} else {
						$data = array(
							"status" => "error",
							"code" => 400,
							"msg" => "Video not uploaded, Vdieo is Empty"
						);
					}
					//End Else File Null	
				}
				//VideoId Null - User Owner & Video Exist
			} else {
				$data = array(
					"status" => "error",
					"code" => 400,
					"msg" => "Video not uploaded, User not Owner or Video is NULL"
				);
			}


			//AuthCheck
		} else {
			$data = array(
				"status" => "error",
				"code" => 400,
				"msg" => "Video not uploaded, Authorization Failed"
			);
		}

		return $helpers->json($data);
//Upload Action Action	
	}

//FIN CLASS
}
