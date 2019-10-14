<?php

namespace Tests\AppBundle\Controller;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Tests\BaseWebTestCase;

class CertificateControllerTest extends BaseWebTestCase
{
    public function testShow()
    {
        $crawler = $this->teamLeaderGoTo('/kontrollpanel/attest');
        $this->assertEquals(1, $crawler->filter('h1:contains("Attester")')->count());
    }

    public function testUpload()
    {
        $crawler = $this->teamLeaderGoTo('/kontrollpanel/attest');


        // Check that there is no signature
        $before = $crawler->filter('Legg til signatur for å laste ned attest')->count();
        if ($before >= 1)
        {
            $before = 1;
        }
        $this->assertEquals(0, $before);



        // Upload new Signature
        $crawler = $this->teamLeaderGoTo('/kontrollpanel/attest');

            // Create signature test-file

            // Submit image
        $form = $crawler->selectButton('Lagre')->form();

        $form['create_signature[description]'] = 'Test123';

        $client = $this->createTeamLeaderClient();
        $client->submit($form);

        $crawler = $this->teamLeaderGoTo('/kontrollpanel/attest');

        // Check that signature upload succeeded

        $after = $crawler->filter('Test123')->count();
        $this->assertEquals(0, $after);


        $after = $crawler->filter('Legg til signatur for å laste ned attest')->count();
        if ($after >= 1)
        {
            $after = 1;
        }
        $this->assertEquals(0, $after);



    }

}