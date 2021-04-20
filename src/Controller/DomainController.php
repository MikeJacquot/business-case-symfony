<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DomainController extends AbstractController
{
    #[Route('/domain', name: 'domain')]
    public function index(): Response
    {
        return $this->render('domain/index.html.twig', [
            'controller_name' => 'DomainController',
        ]);
    }

#[Route('/domain/{id}', name: 'domain_detail')]
public function detail($id): Response
{
    return $this->render('domain/detail.html.twig', [
        'id' => $id,
    ]);
}


}
