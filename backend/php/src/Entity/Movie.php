<?php
// src/Entity/Movie.php
namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="movies")
 */
class Movie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $overview;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $posterurl;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $genres;

    // Getters e setters
    public function getId() {
        return is_scalar($this->id) ? $this->id : null;
    }
    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }
    public function getOverview() { return $this->overview; }
    public function setOverview($overview) { $this->overview = $overview; }
    public function getPosterurl() { return $this->posterurl; }
    public function setPosterurl($posterurl) { $this->posterurl = $posterurl; }
    public function getGenres() { return $this->genres; }
    public function setGenres($genres) { $this->genres = $genres; }
}
