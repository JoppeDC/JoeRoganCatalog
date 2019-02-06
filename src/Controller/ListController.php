<?php

namespace App\Controller;

use App\Repository\YoutubeVideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    private $videoRepository;

    public function __construct(YoutubeVideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $videos = $this->videoRepository->findBy([], ['publishedAt' => 'ASC']);

        return $this->render('list/index.html.twig', [
            'list' => $videos,
        ]);
    }
}
