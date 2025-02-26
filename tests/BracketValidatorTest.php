<?php

use PHPUnit\Framework\TestCase;
use BracketValidator\BracketValidator;

class BracketValidatorTest extends TestCase
{
  public function testValidExpressions()
  {
    $this->assertTrue(BracketValidator::isValid("(2 + 3) * 5"));
    $this->assertTrue(BracketValidator::isValid("((1 + 2) * (3 + 4))"));
    $this->assertTrue(BracketValidator::isValid("5 + (4 - (3 + 2))"));
    $this->assertTrue(BracketValidator::isValid("(a + b) * (c - d) / (e + f)"));
    $this->assertTrue(BracketValidator::isValid("((x)) + ((y)) - ((z))"));
    $this->assertTrue(BracketValidator::isValid("5 * (4 - 2)"));
  }

  public function testInvalidExpressions()
  {
    $this->assertFalse(BracketValidator::isValid("(2 + 3 * 5"));
    $this->assertFalse(BracketValidator::isValid("((1 + 2) * (3 + 4)"));
    $this->assertFalse(BracketValidator::isValid("5 + 4) - (3 + 2"));
    $this->assertFalse(BracketValidator::isValid("(a + b) * (c - d)) / (e + f)"));
    $this->assertFalse(BracketValidator::isValid("((x + y) - z"));
    $this->assertFalse(BracketValidator::isValid("5 * (4 - 2("));
  }
}
