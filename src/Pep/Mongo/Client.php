<?php

namespace Pep\Mongo;

use MongoClient;

class Client extends MongoClient {

  public static function arrayConnect(array $options, array $config = ['connect' => true], array $driverOptions = []) {
    $uri = new URI($options);

    return new self((string) $uri, $config, $driverOptions);
  }

}