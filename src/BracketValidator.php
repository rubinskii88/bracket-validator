<?php

namespace BracketValidator;

class BracketValidator
{
  public static function isValid(string $expression): bool
  {
    $stack = [];

    for ($i = 0, $length = strlen($expression); $i < $length; $i++) {
      $char = $expression[$i];

      if ($char === '(') {
        // Открывающая скобка — добавляем в стек
        $stack[] = $char;
      } elseif ($char === ')') {
        // Закрывающая скобка — проверяем, есть ли открытая
        if (empty($stack)) {
          return false; // Лишняя закрывающая скобка
        }
        array_pop($stack); // Удаляем соответствующую открывающую
      }
    }

    // Если стек пуст, скобки сбалансированы
    return empty($stack);
  }
}
