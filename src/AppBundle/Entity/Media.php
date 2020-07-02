<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MediaRepository")
 * @Vich\Uploadable
 */
class Media
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


       /**
             * @ORM\ManyToOne(targetEntity="Gallerie", inversedBy="media")
             */
            private $gallerie;



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



     // ... other fields

        /**
         * NOTE: This is not a mapped field of entity metadata, just a simple property.
         *
         * @Vich\UploadableField(mapping="media_image", fileNameProperty="imageName", size="imageSize")
         *
         * @var File
         */
        private $imageFile;

        /**
         * @ORM\Column(type="string", length=255)
         *
         * @var string
         */
        public $imageName;

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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt;
     *
     * @return Event
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt;
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

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
     * Set gallerie
     *
     * @param \AppBundle\Entity\Gallerie $gallerie
     *
     * @return Event
     */
    public function setGallerie(\AppBundle\Entity\Gallerie $gallerie = null)
    {
        $this->gallerie = $gallerie;

        return $this;
    }

    /**
     * Get gallerie
     *
     * @return \AppBundle\Entity\Gallerie
     */
    public function getGallerie()
    {
        return $this->gallerie;
    }





}
