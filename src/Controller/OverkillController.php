<?php

namespace App\Controller;

use App\Entity\Upload;
use App\Form\UploadType;
use App\Message\UploadMessage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class OverkillController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    #[Route('/', name: 'overkill')]
    public function index(Request $request, MessageBusInterface $bus): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $upload = new Upload();
        $form = $this->createForm(UploadType::class, $upload)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $upload->setUploadedBy($this->getUser());

            $this->entityManager->persist($upload);
            $this->entityManager->flush();

            $bus->dispatch(new UploadMessage(upload: $upload->getImageFile(), user: $this->getUser()->getUserIdentifier()));

            return $this->redirectToRoute('overkill');
        }

        return $this->render('overkill/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
