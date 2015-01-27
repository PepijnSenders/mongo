<?php

use Pep\Mongo\URI;

class URITest extends PHPUnit_Framework_TestCase {

  public function testCreate() {
    $uri = new URI('aap', 'staart');

    $this->assertEquals($uri->createUri(), (string) $uri, 'toString function broken');
    $this->assertEquals((string) $uri, 'mongodb://aap:staart@localhost:27017/admin', 'Output URI not ok!');

    $uri = new URI('aap', 'staart', 'ergens', 200, 'database', [
      'ssl' => true,
      'connectTimeoutMS' => 200,
    ]);

    $this->assertEquals((string) $uri, 'mongodb://aap:staart@ergens:200/database?ssl=1&connectTimeoutMS=200', 'Output intricate URI not ok!');
  }

}