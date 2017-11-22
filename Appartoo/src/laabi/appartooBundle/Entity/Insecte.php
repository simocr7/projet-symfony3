<?php

namespace laabi\appartooBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Insecte
 *
 * @ORM\Table(name="insecte")
 * @ORM\Entity(repositoryClass="laabi\appartooBundle\Repository\InsecteRepository")
 */
class Insecte
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
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="famille", type="string", length=255)
     */
    private $famille;

    /**
     * @var string
     *
     * @ORM\Column(name="race", type="string", length=255)
     */
    private $race;

    /**
     * @var string
     *
     * @ORM\Column(name="nouriture", type="string", length=255)
     */
    private $nouriture;
    
   /**
    * @ORM\ManyToOne(targetEntity="laabi\appartooBundle\Entity\User",cascade={"persist"})
    */
    private $user;

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
     * Set age
     *
     * @param integer $age
     *
     * @return Insecte
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set famille
     *
     * @param string $famille
     *
     * @return Insecte
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set race
     *
     * @param string $race
     *
     * @return Insecte
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set nouriture
     *
     * @param string $nouriture
     *
     * @return Insecte
     */
    public function setNouriture($nouriture)
    {
        $this->nouriture = $nouriture;

        return $this;
    }

    /**
     * Get nouriture
     *
     * @return string
     */
    public function getNouriture()
    {
        return $this->nouriture;
    }
  

 /**
    * set User
    * @param User $user
    */
    public function setUser(User $user )
    {
        $this->user = $user;

        return $this;
    }

    /**
    * getUser
    * @return User $user
    */
    public function getUser()
    {
        return $this->user;
    }





}
