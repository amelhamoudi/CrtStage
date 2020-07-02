<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategorieRepository")
 */
class Categorie
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
         * @ORM\OneToMany(targetEntity="Event", mappedBy="categorie")
         */
        private $event;


         public function __construct()
            {
                $this->event = new ArrayCollection();
            }


    /**
     * @var string
     *
     * @ORM\Column(name="NomCategorie", type="string", length=255)
     */
    private $nomCategorie;


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
     * Set nomCategorie
     *
     * @param string $nomCategorie
     *
     * @return Categorie
     */
    public function setNomCategorie($nomCategorie)
    {
        $this->nomCategorie = $nomCategorie;

        return $this;
    }

    /**
     * Get nomCategorie
     *
     * @return string
     */
    public function getNomCategorie()
    {
        return $this->nomCategorie;
    }



    /**
         * Add event
         *
         * @param \AppBundle\Entity\Event $event
         *
         * @return Categorie
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




    public function __toString()
        {
            return $this->getNomCategorie();
        }
}