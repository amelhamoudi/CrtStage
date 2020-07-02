<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Gallerie
 *
 * @ORM\Table(name="gallerie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GallerieRepository")
 */
class Gallerie
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
         * @ORM\OneToMany(targetEntity="Event", mappedBy="gallerie")
         */
        private $event;


         public function __construct()
            {
                $this->event = new ArrayCollection();
                $this->media = new ArrayCollection();
            }
     /**
      * @ORM\OneToMany(targetEntity="Media", mappedBy="gallerie")
         */
             private $media;




    /**
     * @var string
     *
     * @ORM\Column(name="nomGallerie", type="string", length=255, unique=true)
     */
    private $nomGallerie;


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
     * Set nomGallerie
     *
     * @param string $nomGallerie
     *
     * @return Gallerie
     */
    public function setNomGallerie($nomGallerie)
    {
        $this->nomGallerie = $nomGallerie;

        return $this;
    }

    /**
     * Get nomGallerie
     *
     * @return string
     */
    public function getNomGallerie()
    {
        return $this->nomGallerie;
    }


    /**
             * Add event
             *
             * @param \AppBundle\Entity\Event $event
             *
             * @return Gallerie
             */
            public function addEvent(\AppBundle\Entity\Event $event)
            {
                $this->event[] = $event;

                return $this;
            }

            /**
             * Remove event
             *
             * @param \AppBundle\Entity\Event $event
             */
            public function removeEvent(\AppBundle\Entity\Event $event)
            {
                $this->event->removeElement($event);
            }

        /**
         * Get event
         *
         * @return \Doctrine\Common\Collections\Collection
         */
        public function getEvent()
        {
            return $this->event;
        }



/**
         * Add media
         *
         * @param \AppBundle\Entity\Media $media
         *
         * @return Categorie
         */
        public function addMedia(\AppBundle\Entity\Media $media)
        {
            $this->media[] = $media;

            return $this;
        }

        /**
         * Remove media
         *
         * @param \AppBundle\Entity\Media $media
         */
        public function removeMedia(\AppBundle\Entity\Media $media)
        {
            $this->media->removeElement($media);
        }

    /**
     * Get media
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedia()
    {
        return $this->media;
    }





        public function __toString()
            {
                return $this->getNomGallerie();
            }
}
