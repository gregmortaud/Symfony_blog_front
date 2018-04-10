<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use GuzzleHttp\Client;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        $client = new Client();
        $auth = array(
          'content-type' => 'application/json',
          'json' => array()
        );
        $response = $client->request('GET', 'http://127.0.0.1:8000/article/list', $auth);
        $content = (string) $response->getBody();
        $listArticle = json_decode($content);
        return $this->render('@App/home.html.twig', [
          "listArticle" => $listArticle,
        ]);
    }

    /**
     * @Route("/login")
     * @Method({"GET"})
     */
    public function loginAction()
    {

        // $client = new Client();
        // $response = $client->request('GET', 'http://127.0.0.1:8000/login');
        // print_r ($response);
        return $this->render('@App/Security/login.html.twig');
    }

    /**
     * @Route("/login_check")
     */
    public function login_checkAction()
    {
      $client = new Client();
      $auth = array(
        'content-type' => 'application/json',
        'json' => array()
      );
      $response = $client->request('GET', 'http://127.0.0.1:8000/login', $auth);
      $content = (string) $response->getBody();
      $listArticle = json_decode($content);
      return $this->render('@App/home.html.twig', [
        "listArticle" => $listArticle,
      ]);


        // echo "login_check";
        // $client = new Client();
        // $auth = array(
        //   'content-type' => 'application/json',
        //   'json' => array()
        // );
        // $response = $client->request('GET', 'http://127.0.0.1:8000/article/list', $auth);
        // $content = (string) $response->getBody();
        // $listArticle = json_decode($content);
        // return $this->render('@App/home.html.twig', [
        //   "listArticle" => $listArticle,
        // ]);
    }


    /**
     * @Route("/add_article")
     * @Method({"GET"})
     */
    public function addArticleAction()
    {
        return $this->render('@App/Article/addArticle.html.twig');
    }
}
