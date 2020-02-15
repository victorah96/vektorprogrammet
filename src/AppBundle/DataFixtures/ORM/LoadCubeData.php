<?php
namespace AppBundle\DataFixtures\ORM;
use AppBundle\Entity\Cube;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
class LoadCubeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $kube1 = new Cube();
        $kube1->setLength(3);
        $kube1->setName("førsteKube");
        $manager->persist($kube1);

        $kube2 = new Cube();
        $kube2->setLength(6);
        $kube2->setName("andreKube");
        $manager->persist($kube2);

        $kube3 = new Cube();
        $kube3->setLength(9);
        $kube3->setName("tredjeKube");
        $manager->persist($kube3);


        $manager->flush();
    }
    public function getOrder()
    {
        return 5;
    }
}