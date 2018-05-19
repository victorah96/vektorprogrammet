<?php

namespace AppBundle\Entity\Repository;

use AppBundle\Entity\Team;
use AppBundle\Entity\User;
use AppBundle\Entity\TeamMembership;
use Doctrine\ORM\EntityRepository;

/**
 * TeamMembershipRepository.
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TeamMembershipRepository extends EntityRepository
{
    /**
     * @param User $user
     *
     * @return TeamMembership[]
     */
    public function findByUser(User $user): array
    {
        return $this->createQueryBuilder('team_membership')
            ->select('team_membership')
            ->where('team_membership.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }
    /**
     * @return TeamMembership[]
     */
    public function findActiveTeamMemberships()
    {
        $today = new \DateTime('now');

        return $this->createQueryBuilder('whistory')
            ->select('whistory')
            ->join('whistory.startSemester', 'startSemester')
            ->leftJoin('whistory.endSemester', 'endSemester')
            ->where('startSemester.semesterStartDate < :today')
            ->andWhere('endSemester is null or endSemester.semesterEndDate > :today')
            ->setParameter('today', $today)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param Team $team
     *
     * @return TeamMembership[]
     */
    public function findActiveTeamMembershipsByTeam($team)
    {
        $today = new \DateTime('now');

        return $this->createQueryBuilder('whistory')
            ->select('whistory')
            ->join('whistory.startSemester', 'startSemester')
            ->leftJoin('whistory.endSemester', 'endSemester')
            ->where('startSemester.semesterStartDate < :today')
            ->andWhere('whistory.team = :team')
            ->andWhere('endSemester is null or endSemester.semesterEndDate > :today')
            ->setParameter('today', $today)
            ->setParameter('team', $team)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param $team
     * @param $user
     *
     * @return array
     */
    public function findActiveTeamMembershipsByTeamAndUser(Team $team, User $user)
    {
        $today = new \DateTime('now');

        return $this->createQueryBuilder('whistory')
            ->select('whistory')
            ->join('whistory.startSemester', 'startSemester')
            ->leftJoin('whistory.endSemester', 'endSemester')
            ->where('startSemester.semesterStartDate < :today')
            ->andWhere('whistory.team = :team')
            ->andWhere('endSemester is null or endSemester.semesterEndDate > :today')
            ->andWhere('whistory.user = :user')
            ->setParameter('today', $today)
            ->setParameter('team', $team)
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param Team $team
     *
     * @return TeamMembership[]
     */
    public function findInActiveTeamMembershipsByTeam($team)
    {
        $today = new \DateTime('now');

        return $this->createQueryBuilder('whistory')
            ->select('whistory')
            ->join('whistory.startSemester', 'startSemester')
            ->leftJoin('whistory.endSemester', 'endSemester')
            ->where('startSemester.semesterStartDate < :today')
            ->andWhere('whistory.team = :team')
            ->andWhere('endSemester.semesterEndDate < :today')
            ->setParameter('today', $today)
            ->setParameter('team', $team)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param $user
     *
     * @return TeamMembership[]
     */
    public function findActiveTeamMembershipsByUser($user)
    {
        $today = new \DateTime('now');

        return $this->createQueryBuilder('whistory')
            ->select('whistory')
            ->join('whistory.startSemester', 'startSemester')
            ->leftJoin('whistory.endSemester', 'endSemester')
            ->where('startSemester.semesterStartDate < :today')
            ->andWhere('whistory.user = :user')
            ->andWhere('endSemester.semesterEndDate > :today OR endSemester.semesterEndDate is NULL')
            ->setParameter('today', $today)
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param $department
     *
     * @return TeamMembership[]
     */
    public function findTeamMembershipsByDepartment($department)
    {
        return $this->createQueryBuilder('wh')
            ->join('wh.team', 'team')
            ->where('team.department = :department')
            ->setParameter('department', $department)
            ->getQuery()
            ->getResult();
    }
}