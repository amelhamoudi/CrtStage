<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * jour
 *
 * @ORM\Table(name="jour")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\jourRepository")
 * @Vich\Uploadable
 */
class jour
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
         * @Vich\UploadableField(mapping="jour_image", fileNameProperty="imageName", size="imageSize")
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
     * @ORM\Column(name="nomjour", type="string", length=255)
     */
    private $nomjour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomjour.
     *
     * @param string $nomjour
     *
     * @return jour
     */
    public function setNomjour($nomjour)
    {
        $this->nomjour = $nomjour;

        return $this;
    }

    /**
     * Get nomjour.
     *
     * @return string
     */
    public function getNomjour()
    {
        return $this->nomjour;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return jour
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
