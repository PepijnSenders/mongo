<?php

namespace Pep\Mongo;

use MongoClient;

class Client extends MongoClient {

  public static function uriConnect($uri = '', array $config = ['connect' => true], array $driverOptions = []) {
    return new self($uri, $config, $driverOptions);
  }

  public static function arrayConnect(array $options, array $config = ['connect' => true], array $driverOptions = []) {

  }

}