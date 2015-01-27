<?php

use Pep\Mongo\URI;

class URITest extends PHPUnit_Framework_TestCase {

  public function testCreate() {
    $uri = new URI('aap', 'staart');

    $this->assertEquals($uri->createUri(), (string) $uri, 'toString function broken');
    $this->assertEquals((string) $uri, 'mongodb://aap:staart@localhost:27017/admin', 'Output URI not ok!');
  }

}