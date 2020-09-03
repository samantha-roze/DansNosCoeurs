<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class MessageComplet {

    /* on déclare les éléments du formulaire avec leurs contraintes associées */

    /**
     * @Assert\Length(
     *     min = 2,
     *     max = 100,
     *     minMessage = "Le nom doit comporter au minimum 2 caractères",
     *     maxMessage = "Le nom doit comporter au maximum 100 caractères"
     * )
     * @Assert\NotBlank(
     *     message = "Le nom ne peut pas être vide"
     * )
     */
    private $nom;

    /**
     * @Assert\Length(
     *     min = 2,
     *     max = 100,
     *     minMessage = "Le prénom doit comporter au minimum 2 caractères",
     *     maxMessage = "Le prénom doit comporter au maximum 100 caractères"
     * )
     * @Assert\NotBlank(
     *     message = "Le prénom ne peut pas être vide"
     * )
     */
    private $prenom;

    /**
     * @Assert\Regex(
     *     pattern = "/\d{2}\.\d{2}\.\d{2}\.\d{2}\.\d{2}/",
     *     message = "Ce numéro de téléphone n'est pas valide"
     * )
     */
    private $telephone;

    /**
     * @Assert\Email(
     *     message = "Cet email n'est pas valide"
     * )
     */
    private $email;

    /**
     * @Assert\NotBlank(
     *     message = "Vous devez selectionner un moins une disponibilité"
     * )
     */
    private $rappel;

    /**
     * @Assert\NotBlank(
     *     message = "Vous devez selectionner l'objet de la demande"
     * )
     */
    private $choix;

    /**
     * @Assert\Length(
     *     min = 10,
     *     max = 500,
     *     minMessage = "Le message doit comporter au minimum 10 caractères",
     *     maxMessage = "Le message doit comporter au maximum 500 caractères"
     * )
     */
    private $message;

    /**
     * Get nom.
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /** 
     * Set nom.
     * @param string $nom
     * @return MessageComplet
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /** 
     * Get prenom.
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /** 
     * Set prenom.
     * @param string $prenom
     * @return MessageComplet
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /** 
     * Get telephone.
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /** 
     * Set telephone.
     * @param string $telephone
     * @return MessageComplet
     */
    public function Telephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * Set email.
     * @param string $telephone
     * @return MessageComplet
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email.
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set rappel.
     * @param string $rappel
     * @return Message
     */
    public function setRappel($rappel)
    {
        $this->rappel = $rappel;
        return $this;
    }

    /**
     * Get rappel.
     * @return string
     */
    public function getRappel()
    {
        return $this->rappel;
    }

    /**
     * Set choix.
     * @param string $choix
     * @return MessageComplet
     */
    public function setChoix($choix)
    {
        $this->choix = $choix;
        return $this;
    }

    /**
     * Get choix.
     * @return string
     */
    public function getChoix()
    {
        return $this->choix;
    }

    /**
     * Set message.
     * @param string $message
     * @return MessageComplet
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Get message.
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}

?>