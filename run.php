#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use BracketValidator\BracketValidator;

if ($argc < 2) {
  echo "Usage: php run.php '<expression>'\n";
  exit(1);
}

$expression = $argv[1];

if (BracketValidator::isValid($expression)) {
  echo "Correct brackets placement.\n";
  exit(0);
} else {
  echo "Incorrect brackets placement.\n";
  exit(1);
}
