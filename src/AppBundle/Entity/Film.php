<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Film
 *
 * @ORM\Table(name="film")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FilmRepository")
 */
class Film
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
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="films")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="film", orphanRemoval=true)
     */
    private $comments;
    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }



    /**
     * @var int
     *
     * @ORM\Column(name="id_distrib", type="integer", nullable=true)
     */
    private $idDistrib;

     /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

      /**
     * @var string
     *
     * @ORM\Column(name="resum", type="string", length=255)
     */
    private $resum;

      /**
     * @var \Date
     *
     * @ORM\Column(name="date_debut_affiche", type="date")
     */
    private $dateDebutAffiche;
      /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin_affiche", type="date")
     */
    private $dateFinAffiche;

     /**
     * @var int
     *
     * @ORM\Column(name="duree_min", type="integer")
     */
    private $dureeMin;

    /**
     * @var int
     *
     * @ORM\Column(name="annee_prod", type="integer", nullable=true)
     */
    private $anneeProd;


    /**
     * Get the value of idFilm
     *
     * @return  int
     */ 
    public function getIdFilm()
    {
        return $this->idFilm;
    }

    /**
     * Get the value of idGenre
     *
     * @return  int
     */ 
    public function getIdGenre()
    {
        return $this->idGenre;
    }

    /**
     * Set the value of idGenre
     *
     * @param  int  $idGenre
     *
     * @return  self
     */ 
    public function setIdGenre(int $idGenre)
    {
        $this->idGenre = $idGenre;

        return $this;
    }

    /**
     * Get the value of idDistrib
     *
     * @return  int
     */ 
    public function getIdDistrib()
    {
        return $this->idDistrib;
    }

    /**
     * Set the value of idDistrib
     *
     * @param  int  $idDistrib
     *
     * @return  self
     */ 
    public function setIdDistrib(int $idDistrib)
    {
        $this->idDistrib = $idDistrib;

        return $this;
    }

    /**
     * Get the value of titre
     *
     * @return  string
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @param  string  $titre
     *
     * @return  self
     */ 
    public function setTitre(string $titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of resum
     *
     * @return  string
     */ 
    public function getResum()
    {
        return $this->resum;
    }

    /**
     * Set the value of resum
     *
     * @param  string  $resum
     *
     * @return  self
     */ 
    public function setResum(string $resum)
    {
        $this->resum = $resum;

        return $this;
    }

    /**
     * Get the value of dateDebutAffiche
     *
     * @return  \DateTime
     */ 
    public function getDateDebutAffiche()
    {
        return $this->dateDebutAffiche;
    }

    /**
     * Set the value of dateDebutAffiche
     *
     * @param  \DateTime  $dateDebutAffiche
     *
     * @return  self
     */ 
    public function setDateDebutAffiche(\DateTime $dateDebutAffiche)
    {
        $this->dateDebutAffiche = $dateDebutAffiche;

        return $this;
    }

    /**
     * Get the value of dateFinAffiche
     *
     * @return  \DateTime
     */ 
    public function getDateFinAffiche()
    {
        return $this->dateFinAffiche;
    }

    /**
     * Set the value of dateFinAffiche
     *
     * @param  \DateTime  $dateFinAffiche
     *
     * @return  self
     */ 
    public function setDateFinAffiche(\DateTime $dateFinAffiche)
    {
        $this->dateFinAffiche = $dateFinAffiche;

        return $this;
    }

    /**
     * Get the value of dureeMin
     *
     * @return  int
     */ 
    public function getDureeMin()
    {
        return $this->dureeMin;
    }

    /**
     * Set the value of dureeMin
     *
     * @param  int  $dureeMin
     *
     * @return  self
     */ 
    public function setDureeMin(int $dureeMin)
    {
        $this->dureeMin = $dureeMin;

        return $this;
    }

    /**
     * Get the value of anneeProd
     *
     * @return  int
     */ 
    public function getAnneeProd()
    {
        return $this->anneeProd;
    }

    /**
     * Set the value of anneeProd
     *
     * @param  int  $anneeProd
     *
     * @return  self
     */ 
    public function setAnneeProd(int $anneeProd)
    {
        $this->anneeProd = $anneeProd;

        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of comments
     */ 
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set the value of comments
     *
     * @return  self
     */ 
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }
}


    