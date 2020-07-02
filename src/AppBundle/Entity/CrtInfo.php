<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CrtInfo
 *
 * @ORM\Table(name="crt_info")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CrtInfoRepository")
 */
class CrtInfo
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
     * @var int
     *
     * @ORM\Column(name="nbrFormation", type="integer")
     */
    private $nbrFormation;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrMembre", type="integer")
     */
    private $nbrMembre;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrVolontaire", type="integer")
     */
    private $nbrVolontaire;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrJaime", type="integer")
     */
    private $nbrJaime;


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
     * Set nbrFormation.
     *
     * @param int $nbrFormation
     *
     * @return CrtInfo
     */
    public function setNbrFormation($nbrFormation)
    {
        $this->nbrFormation = $nbrFormation;

        return $this;
    }

    /**
     * Get nbrFormation.
     *
     * @return int
     */
    public function getNbrFormation()
    {
        return $this->nbrFormation;
    }

    /**
     * Set nbrMembre.
     *
     * @param int $nbrMembre
     *
     * @return CrtInfo
     */
    public function setNbrMembre($nbrMembre)
    {
        $this->nbrMembre = $nbrMembre;

        return $this;
    }

    /**
     * Get nbrMembre.
     *
     * @return int
     */
    public function getNbrMembre()
    {
        return $this->nbrMembre;
    }

    /**
     * Set nbrVolontaire.
     *
     * @param int $nbrVolontaire
     *
     * @return CrtInfo
     */
    public function setNbrVolontaire($nbrVolontaire)
    {
        $this->nbrVolontaire = $nbrVolontaire;

        return $this;
    }

    /**
     * Get nbrVolontaire.
     *
     * @return int
     */
    public function getNbrVolontaire()
    {
        return $this->nbrVolontaire;
    }

    /**
     * Set nbrJaime.
     *
     * @param int $nbrJaime
     *
     * @return CrtInfo
     */
    public function setNbrJaime($nbrJaime)
    {
        $this->nbrJaime = $nbrJaime;

        return $this;
    }

    /**
     * Get nbrJaime.
     *
     * @return int
     */
    public function getNbrJaime()
    {
        return $this->nbrJaime;
    }
}
