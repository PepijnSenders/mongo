<?php

use Pep\Mongo\URI;
use Faker\Factory;

class URITest extends PHPUnit_Framework_TestCase {

  public function testCreate() {
    $faker = Factory::create();

    $username = $faker->userName;
    $password = $faker->userName;

    $uri = new URI([
      'username' => $username,
      'password' => $password,
    ]);

    $this->assertEquals($uri->createUri(), (string) $uri, 'toString function broken');
    $this->assertEquals((string) $uri, "mongodb://$username:$password@localhost:27017/admin", 'Output URI not ok!');

    $host = $faker->domainName;
    $database = $faker->userName;
    $port = $faker->randomNumber(5);
    $ssl = (int) $faker->boolean;
    $connectTimeoutMS = $faker->randomNumber;

    $uri = new URI([
      'username' => $username,
      'password' => $password,
      'host' => $host,
      'port' => $port,
      'database' => $database,
      'options' => [
        'ssl' => $ssl,
        'connectTimeoutMS' => $connectTimeoutMS,
      ],
    ]);

    $this->assertEquals((string) $uri, "mongodb://$username:$password@$host:$port/$database?ssl=$ssl&connectTimeoutMS=$connectTimeoutMS", 'Output intricate URI not ok!');
  }

}