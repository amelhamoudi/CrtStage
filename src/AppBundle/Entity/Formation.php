<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormationRepository")
 * @Vich\Uploadable
 */
class Formation
{
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
         * @Vich\UploadableField(mapping="event_image", fileNameProperty="imageName", size="imageSize")
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
         * @ORM\Column(type="integer")
         *
         * @var integer
         */
        private $imageSize;

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

        public function setImageSize(?int $imageSize): void
        {
            $this->imageSize = $imageSize;
        }

        public function getImageSize(): ?int
        {
            return $this->imageSize;
        }




    /**
     * @var string
     *
     * @ORM\Column(name="nomformation", type="string", length=255)
     */
    private $nomformation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaire", type="datetime")
     */
    private $horaire;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrplace", type="integer")
     */
    private $nbrplace;


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
     * Set nomformation
     *
     * @param string $nomformation
     *
     * @return Formation
     */
    public function setNomformation($nomformation)
    {
        $this->nomformation = $nomformation;

        return $this;
    }

    /**
     * Get nomformation
     *
     * @return string
     */
    public function getNomformation()
    {
        return $this->nomformation;
    }

    /**
     * Set horaire
     *
     * @param \DateTime $horaire
     *
     * @return Formation
     */
    public function setHoraire($horaire)
    {
        $this->horaire = $horaire;

        return $this;
    }

    /**
     * Get horaire
     *
     * @return \DateTime
     */
    public function getHoraire()
    {
        return $this->horaire;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Formation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Formation
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set nbrplace
     *
     * @param integer $nbrplace
     *
     * @return Formation
     */
    public function setNbrplace($nbrplace)
    {
        $this->nbrplace = $nbrplace;

        return $this;
    }

    /**
     * Get nbrplace
     *
     * @return int
     */
    public function getNbrplace()
    {
        return $this->nbrplace;
    }
}

