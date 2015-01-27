<?php

namespace Pep\Mongo;

class URI {

  private $username;
  private $password;
  private $host;
  private $port;
  private $database;
  private $options;

  public function __construct(
    $username = '',
    $password = '',
    $host = 'localhost',
    $port = 27017,
    $database = 'admin',
    $options = []
  ) {
    $this->username = $username;
    $this->password = $password;
    $this->host = $host;
    $this->port = $port;
    $this->database = $database;
    $this->options = $options;
  }

  public function createUri() {
    $uri = 'mongodb://';

    if ($this->username && $this->password) {
      $uri .= "$this->username:$this->password@";
    }

    $uri .= $this->host;

    if ($this->port) {
      $uri .= ":$this->port";
    }

    if ($this->database) {
      $uri .= "/$this->database";
    }

    if (!empty($this->options)) {
      $uri .= '?' . http_build_query($this->options);
    }

    return $uri;
  }

  public function __toString() {
    return $this->createUri();
  }

}