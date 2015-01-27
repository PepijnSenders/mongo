<?php

namespace Pep\Mongo;

class URI {

  private $username;
  private $password;
  private $host;
  private $port;
  private $database;
  private $options;

  private $defaults = [
    'username' => '',
    'password' => '',
    'host' => 'localhost',
    'port' => 27017,
    'database' => 'admin',
    'options' => [],
  ];

  public function __construct(array $options = []) {
    $options = array_merge($this->defaults, $options);

    $this->username = $options['username'];
    $this->password = $options['password'];
    $this->host = $options['host'];
    $this->port = $options['port'];
    $this->database = $options['database'];
    $this->options = $options['options'];
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