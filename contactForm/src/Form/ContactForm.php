<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;

class ContactForm extends AbstractType {

    // fonction pour créer le formulaire
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add("nom", TextType::class, [
                "label" => "Nom*", 
                "required" => false // on enlève le système de vérification du navigateur
            ])
            ->add("prenom", TextType::class, [
                "label" => "Prénom*",
                "required" => false // on enlève le système de vérification du navigateur
            ])
            ->add("telephone", TextType::class, [
                "label" => "Téléphone",
                "required" => false, // on enlève le système de vérification du navigateur
                "attr" => [
                    "maxlength" => 14,
                    "placeholder" => "0_.__.__.__.__"
                ]
            ])
            ->add("email", TextType::class, [
                "label" => "Email", 
                "required" => false // on enlève le système de vérification du navigateur
            ])
            -> add("rappel", ChoiceType::class, [
                "label" => "Quand souhaitez-vous être rappelé?*",
                "expanded" => true,
                "multiple" => true,
                "choices" => [
                    'Dès que possible' => 'des-que-possible',
                    'Le matin' => 'matin',
                    'Le midi' => 'midi',
                    "L'après-midi" => 'apres-midi'
                ]
            ])
            -> add("choix", ChoiceType::class, [
                "label" => "Vous souhaitez*", 
                "choices" => [
                    'Autre' => 'autre',
                    'Contacter le service commercial' => 'service-commercial',
                    'Contacter le service facturation' => 'service-facturation',
                    'Faire une demande sur une association ou un projet solidaire' => 'demande-association',
                    'Proposer une fonctionnalité' => 'proposer-une-fonctionnalite',
                    'Je signale un problème technique' => 'probleme-technique',
                    'Faire une remarque sur le site' => 'remarque-site',
                    'Être rappelé' => 'etre-rappele'
                ]
            ])
            ->add("message", TextareaType::class, [
                "label" => "Message",
                "required" => false // on enlève le système de vérification du navigateur
            ])
            ->add("envoyer", SubmitType::class, [
                "label" => "J'envoie mon message"
            ]);
            
    }    

}

?>