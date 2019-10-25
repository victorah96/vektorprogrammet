<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * Report
 *
 * @ORM\Table(name="report")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\ReportRepository")
 */


class Report
    # TODO: PDF FILE IS CURRRENTLY A STRING
    # to keep things simple in the beginning
    # should later be a pdf file

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


    /**
     * @var string
     *
     * @ORM\Column(name="pdfFile", type="string", length=255)
     */
    private $pdfFile;


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


    /**
     * Get pdfFile
     *
     * @return Report
     */
    public function getPdfFile()
    {
        return $this->pdfFile;
    }

    /**
     * Set pdfFile
     *
     * @return pdfFile
     */
    public function setPdfFile($pdfFile)
    {
        $this->pdfFile = $pdfFile;

        return $this;
    }

}
