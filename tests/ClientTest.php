<?php

use Pep\Mongo\Client;

class ClientTest extends PHPUnit_Framework_TestCase {

  public function testConnect() {
    $client = Client::arrayConnect([]);

    $this->assertInstanceOf('MongoClient', $client, 'Client no MongoClient');
  }

}