<?php

require __DIR__ . "/../Model/Employe.php";
require __DIR__ . "/../Model/monPdo.php";

class ConnexionTest extends \PHPUnit\Framework\TestCase{
    public function testVerifier(){

        $tester = new Employe;
        $result = $tester->verifier("logintest", "pwdtest");

        $this->assertEquals(false, $result);

        $result = $tester->verifier("david123", "mdp1");

        $this->assertEquals(true, $result);

    }
}

?>