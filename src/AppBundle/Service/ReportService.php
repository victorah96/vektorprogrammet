<?php

namespace AppBundle\Service;

use AppBundle\Entity\Repository\ReportRepository;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Report;



class ReportService
{
    /**
     * @var EntityManager
     *
     */
    private $em;


    /**
     * ReportService constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param
     * @param EntityManager $em
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function generateEntities(Report $Report)
    {

        $this->em->persist($Report);
        $this->em->flush();
    }



    public function getOrderedList()
    {
        $repository = $this->em->getRepository('AppBundle:Report');
        $allReports = $repository->findReports();

        return $repository;
    }


}