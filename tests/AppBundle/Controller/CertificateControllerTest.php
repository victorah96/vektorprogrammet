<?php

namespace Tests\AppBundle\Controller;

use Tests\BaseWebTestCase;

class CertificateControllerTest extends BaseWebTestCase
{
    public function testShow()
    {
        $crawler = $this->teamLeaderGoTo('/kontrollpanel/attest');
        $this->assertEquals(1, $crawler->filter('h1:contains("Attester")')->count());
    }

}