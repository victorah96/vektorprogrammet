<?php


namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="BloggInnlegg")
 */
class BloggInnlegg
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $overskrift;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $innlegg;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getInnlegg()
    {
        return $this->innlegg;
    }

    /**
     * @return mixed
     */
    public function getOverskrift()
    {
        return $this->overskrift;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $innlegg
     */
    public function setInnlegg($innlegg): void
    {
        $this->innlegg = $innlegg;
    }

    /**
     * @param mixed $overskrift
     */
    public function setOverskrift($overskrift): void
    {
        $this->overskrift = $overskrift;
    }


}