<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\MessageComplet;
use App\Form\ContactForm;

class ContactController extends AbstractController {

    /** 
     * @Route("/", name="homePage")
     */
    public function homeAction() {
        return $this->redirectToRoute("contactPage", ["choice" => "contactez-nous"]);
    }

    /** 
     * @Route("/contact/{choice}", name="contactPage")
     */
    public function contactAction(Request $request, $choice) {
        $messageComplet = new MessageComplet();

        //assignation au message du choix passé en paramètre
        $messageComplet->setChoix($choice);

        // on coche par défault une case des choix de rappel pour permettre la validation du formulaire
        $messageComplet->setRappel(['des-que-possible']);

        // Création du formulaire de contact
        $form = $this->createForm(ContactForm::class, $messageComplet);
        $form->handleRequest($request);

        // vérifie si "etre-rappele" est passé dans l'url
        $etreRappele = false;
        if ($choice === "etre-rappele") {
            $etreRappele = true;
        }

        // verifie si "etre-rappele" est passé dans le menu déroulant
        if ($form->isSubmitted()) {
            $etreRappele = $form->get('choix')->getData() === "etre-rappele" ? true : false;                   
        }

        // true si tout les champs sont correctements remplis
        $correct = false;

        // Si le formulaire a été soumis et validé alors on envoie le mail
        if ($form->isSubmitted() && $form->isValid()) {
            $correct = true;
        }

        return $this->render("contact.html.twig", [
            "form" => $form->createView(), 
            "etreRappele" => $etreRappele, 
            "correct" => $correct
        ]);


    }

}

?>



