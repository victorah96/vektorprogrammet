<?php

namespace AppBundle\Entity;

/**
 * Report
 *
 * @ORM\Table(name="report")
 */

class Report
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="year", type="integer")
     */
    private $year;


    # ---------TODO--------- #
    /**
     * @var #FILE??
     */
    private $pdfFile;
    # ----------------------- #


    /**
     * Report constructor.
     */
    public function __construct()
    {
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get year
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set year
     *
     * @return Report
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    # TODO
    #   -set pdfFile
    #   -get pdfFile?

}
