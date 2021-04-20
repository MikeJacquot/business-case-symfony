<?php

namespace App\Controller;

use App\Entity\Candidat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidatController extends AbstractController
{
    #[Route('/candidat', name: 'candidat')]
    public function index(): Response
    {
        $em = $this->getDoctrine();
        $repo = $em->getRepository(Candidat::class);
        $candidats = $repo->findAll();
        return $this->render('candidat/index.html.twig', [
            'candidats' => $candidats,
        ]);
    }

    #[Route('/candidat/{id}', name: 'candidat_detail')]
    public function detail($id): Response
    {
        $em = $this->getDoctrine();
        $repo = $em->getRepository(Candidat::class);
        $candidat = $repo->findOneBy(['id'=>$id]);
        return $this->render('candidat/detail.html.twig', [
            'candidat' => $candidat,
        ]);
    }

    #[Route('/candidat_delete/{id}', name: 'candidat_delete')]
    public function delete($id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Candidat::class);
        $candidat = $repo->findOneBy(['id'=>$id]);
        $em->remove($candidat);
        $em->flush();
        return $this->redirectToRoute('candidat');
    }
}
