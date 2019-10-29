<?php


namespace AppBundle\Entity\Repository;

use AppBundle\Entity\Report;
use \Doctrine\ORM\EntityRepository;

/**
 * Class ReportRepository
 */
class ReportRepository extends EntityRepository
{
    # TODO
    # - get data from database, sorted by year

    /**
     * @return array
     */
    public function findReports()
    {
        $reports = $this->createQueryBuilder('report')
            ->select('report')
            ->getQuery()
            ->getResult();

        return $reports;

    }
}