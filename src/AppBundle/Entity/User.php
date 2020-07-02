<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")

 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
       * @return mixed
       */
      public function getId()
      {
          return $this->id;
      }

      /**
       * @param mixed $id
       */
      public function setId($id)
      {
          $this->id = $id;
      }


      public function getRole()
      {
          $roles =array('ROLE_ADMIN', 'ROLE_USER');
          if(in_array('ROLE_ADMIN', $this->roles)) $role = 'Administrateur';
          else $role = 'utilisateur';
          return $role;
      }
}
