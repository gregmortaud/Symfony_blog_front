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
     * @Route("/")
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
     * @Route("/article")
     * @Method({"GET"})
     */
    public function newArticleAction()
    {
      // return new Response("Affichage Front");
        return $this->render('@App/Default/index.html.twig');
    }
}
