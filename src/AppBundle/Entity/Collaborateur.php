<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * Collaborateur
 *
 * @ORM\Table(name="collaborateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CollaborateurRepository")
 * @Vich\Uploadable
 */
class Collaborateur
{

    // ...

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;



// ... other fields

        /**
         * NOTE: This is not a mapped field of entity metadata, just a simple property.
         *
         * @Vich\UploadableField(mapping="collaborateur_image", fileNameProperty="imageName")
         *
         * @var File
         */
        private $imageFile;

        /**
         * @ORM\Column(type="string", length=255)
         *
         * @var string
         */
        private $imageName;


        /**
         * @ORM\Column(type="datetime")
         *
         * @var \DateTime
         */
        public $updatedAt;

        /**

         * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $imageFile
         */
        public function setImageFile(?File $imageFile = null): void
        {
            $this->imageFile = $imageFile;

            if (null !== $imageFile) {
                // It is required that at least one field changes if you are using doctrine
                // otherwise the event listeners won't be called and the file is lost
                $this->updatedAt = new \DateTimeImmutable();
            }
        }

        public function getImageFile(): ?File
        {
            return $this->imageFile;
        }

        public function setImageName(?string $imageName): void
        {
            $this->imageName = $imageName;
        }

        public function getImageName(): ?string
        {
            return $this->imageName;
        }







    /**
     * @var string
     *
     * @ORM\Column(name="nomCollaborateur", type="string", length=255)
     */
    private $nomCollaborateur;

    /**
     * @var string
     *
     * @ORM\Column(name="emailCollaborateur", type="string", length=255, unique=true)
     */
    private $emailCollaborateur;

    /**
     * @var string
     *
     * @ORM\Column(name="telCollaborateur", type="string", length=255, unique=true)
     */
    private $telCollaborateur;



    /**
     * @var string
     *
     * @ORM\Column(name="Specification", type="string", length=255)
     */
    private $specification;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Set nomCollaborateur
     *
     * @param string $nomCollaborateur
     *
     * @return Collaborateur
     */
    public function setNomCollaborateur($nomCollaborateur)
    {
        $this->nomCollaborateur = $nomCollaborateur;

        return $this;
    }

    /**
     * Get nomCollaborateur
     *
     * @return string
     */
    public function getNomCollaborateur()
    {
        return $this->nomCollaborateur;
    }

    /**
     * Set emailCollaborateur
     *
     * @param string $emailCollaborateur
     *
     * @return Collaborateur
     */
    public function setEmailCollaborateur($emailCollaborateur)
    {
        $this->emailCollaborateur = $emailCollaborateur;

        return $this;
    }

    /**
     * Get emailCollaborateur
     *
     * @return string
     */
    public function getEmailCollaborateur()
    {
        return $this->emailCollaborateur;
    }

    /**
     * Set telCollaborateur
     *
     * @param string $telCollaborateur
     *
     * @return Collaborateur
     */
    public function setTelCollaborateur($telCollaborateur)
    {
        $this->telCollaborateur = $telCollaborateur;

        return $this;
    }

    /**
     * Get telCollaborateur
     *
     * @return string
     */
    public function getTelCollaborateur()
    {
        return $this->telCollaborateur;
    }




    /**
     * Set specification
     *
     * @param string $specification
     *
     * @return Collaborateur
     */
    public function setSpecification($specification)
    {
        $this->specification = $specification;

        return $this;
    }

    /**
     * Get specification
     *
     * @return string
     */
    public function getSpecification()
    {
        return $this->specification;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Collaborateur
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
