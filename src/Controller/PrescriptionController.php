<?php

namespace App\Controller;

use App\Entity\Prescription;
use App\Form\PrescriptionType;
use App\Repository\PrescriptionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrescriptionController extends AbstractController
{
    #[Route('/prescription', name: 'app_prescription')]
    public function index(PrescriptionRepository $pr): Response
    {
        $prescriptions = $pr->findAll();
        return $this->render('prescription/index.html.twig', [
            'controller_name' => 'PrescriptionController',
            'prescriptions' => $prescriptions
        ]);
    }

    #[Route('/prescription/add', name: 'app_add_prescription')]
    public function add(Request $request,EntityManagerInterface $em): Response
    {
        $prescription = new Prescription;
        $form = $this->createForm(PrescriptionType::class,$prescription);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $prescription = $form->getData();
            $em->persist($prescription);
            $em->flush();
            return $this->redirectToRoute('app_prescription');
        }
        return $this->render('prescription/add.html.twig', [
            'controller_name' => 'PrescriptionController',
            'form' => $form
        ]);
    }

    #[Route('/prescription/{id}', name: 'app_add_prescription')]
    public function show(PrescriptionRepository $pr,$id): Response
    {
        $prescription = $pr->find($id);
        return $this->render('prescription/add.html.twig', [
            'controller_name' => 'PrescriptionController',
            'prescription' => $prescription
        ]);
    }



}
