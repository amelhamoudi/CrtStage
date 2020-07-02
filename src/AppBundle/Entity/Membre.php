<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Membre
 *
 * @ORM\Table(name="membre")
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MembreRepository")
 */
class Membre
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
             * @Vich\UploadableField(mapping="membre_image", fileNameProperty="imageName", size="imageSize")
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=255)
     */
    private $poste;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Membre
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set poste
     *
     * @param string $poste
     *
     * @return Membre
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste
     *
     * @return string
     */
    public function getPoste()
    {
        return $this->poste;
    }
      /**
         * Set updatedAt
         *
         * @param \DateTime $updatedAt
         *
         * @return Event
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

