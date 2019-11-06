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
     * @return array
     */
    public function findReports()
    {

        return $this->createQueryBuilder('report')
            ->select('report')
            ->orderBy("report.year")
            ->getQuery()
            ->getResult();
    }

}