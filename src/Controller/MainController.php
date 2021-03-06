<?php

namespace App\Controller;

use App\Repository\YoutubeVideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private $videoRepository;

    public function __construct(YoutubeVideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $videos = $this->videoRepository->findBy([], ['publishedAt' => 'ASC']);

        return $this->render('list/index.html.twig', [
            'list' => $videos,
        ]);
    }

    /**
     * @Route("/random", name="random")
     */
    public function random(): Response
    {
        //todo: implement random
        $video = $this->videoRepository->getOneRandom();

        return $this->render('list/random.html.twig', [
            'video' => $video,
        ]);
    }
}
