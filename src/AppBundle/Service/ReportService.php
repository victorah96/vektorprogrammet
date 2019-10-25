<?php

namespace AppBundle\Service;

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
     * TodoListService constructor.
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

    }






}