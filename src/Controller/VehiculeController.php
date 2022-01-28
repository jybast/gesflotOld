<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Document;
use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Repository\VehiculeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/vehicule')]
class VehiculeController extends AbstractController
{
    #[Route('/', name: 'vehicule_index', methods: ['GET'])]
    public function index(VehiculeRepository $vehiculeRepository): Response
    {
        return $this->render('vehicule/index.html.twig', [
            'vehicules' => $vehiculeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'vehicule_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $vehicule = new Vehicule();
        $form = $this->createForm(VehiculeType::class, $vehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // TO DO : File upload service
            // Get submitted files
            $images = $form->get('images')->getData();

            // Get submitted pdf
            $documents = $form->get('documents')->getData();

            // Loop images
            foreach ($images as $image) {
                // set a new file name
                $fichier = md5(uniqid()) . '.' . $image->guessExtension();

                // move file into uploads
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );

                // insert file into database
                $img = new Image();
                $img->setNom($fichier);
                $vehicule->addImage($img);
            }

            // Loop documents
            foreach ($documents as $document) {
                // set a new file name
                $pdf = md5(uniqid()) . '.' . $document->guessExtension();

                // move file into uploads
                $document->move(
                    $this->getParameter('documents_directory'),
                    $pdf
                );

                // insert file into database
                $doc = new Document();
                $doc->setNom($pdf);
                $vehicule->addDocument($doc);
            }

            $entityManager->persist($vehicule);
            $entityManager->flush();

            return $this->redirectToRoute('vehicule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vehicule/new.html.twig', [
            'vehicule' => $vehicule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'vehicule_show', methods: ['GET'])]
    public function show(Vehicule $vehicule): Response
    {
        return $this->render('vehicule/show.html.twig', [
            'vehicule' => $vehicule,
        ]);
    }

    #[Route('/{id}/edit', name: 'vehicule_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Vehicule $vehicule, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VehiculeType::class, $vehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // TO DO : File upload service
            // Get submitted images
            $images = $form->get('images')->getData();
            // Get submitted documents
            $documents = $form->get('documents')->getData();

            // Loop images
            foreach ($images as $image) {
                // Set a new file name
                $fichier = md5(uniqid()) . '.' . $image->guessExtension();

                // move file into uploads
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );

                // insert file into database
                $img = new Image();
                $img->setNom($fichier);
                $vehicule->addImage($img);
            }

            // Loop documents
            foreach ($documents as $document) {
                // Set a new file name
                $pdf = md5(uniqid()) . '.' . $document->guessExtension();

                // move file into uploads
                $document->move(
                    $this->getParameter('documents_directory'),
                    $pdf
                );

                // insert file into database
                $doc = new Document();
                $doc->setNom($pdf);
                $vehicule->addDocument($doc);
            }

            $entityManager->persist($vehicule);
            $entityManager->flush();

            return $this->redirectToRoute('vehicule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vehicule/edit.html.twig', [
            'vehicule' => $vehicule,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'vehicule_delete', methods: ['POST'])]
    public function delete(Request $request, Vehicule $vehicule, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $vehicule->getId(), $request->request->get('_token'))) {
            $entityManager->remove($vehicule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vehicule_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/delete/image/{id}', name: 'vehicule_image_delete', methods: ['DELETE'])]
    public function image_delete(Request $request, Image $image, EntityManagerInterface $entityManager)
    {
        $data = json_decode($request->getContent(), true);

        // Check if token is valid
        if ($this->isCsrfTokenValid('delete' . $image->getId(), $data['_token'])) {
            // Get image name
            $nom = $image->getNom();
            // delete file from directory
            unlink($this->getParameter('images_directory') . '/' . $nom);
            // delete record from database
            $entityManager->remove($image);
            $entityManager->flush();

            // Return response
            return new JsonResponse(['success' => 1]);
        } else {
            return new JsonResponse(['error' => 'Token invalide'], 400);
        }
    }
}
