<?php


namespace AppBundle\Entity\Repository;

use AppBundle\Entity\Report;
use Doctrine\ORM\EntityManager;
use \Doctrine\ORM\EntityRepository;
use function Clue\StreamFilter\append;

/**
 * Class ReportRepository
 */
class ReportRepository extends EntityRepository
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





    /**
     * @return array
     */
    public function findReports()
    {
        //$reports = $this->createQueryBuilder('report')
         //   ->select('report')
          //  ->getQuery()
           // ->getResult();


        //return $reports;

    }
}