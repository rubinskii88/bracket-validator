# Bracket Validator

[![Build Status](https://app.travis-ci.com/rubinskii88/bracket-validator.svg?branch=main)](https://app.travis-ci.com/rubinskii88/bracket-validator)

**Bracket Validator** — консольная утилита на PHP для проверки корректности расстановки круглых скобок.

# Возможности

1. Проверяет корректность круглых скобок.
2. Работает через командную строку (CLI).
3. Написан на PHP 7.1+ и выше.
4. Покрыт юнит-тестами (PHPUnit).
5. Интеграция с Travis CI для автоматической проверки кода.
6. Для управления зависимостями используется Composer

# Установка и запуск

1. Клонировать репозиторий

```bash
git clone https://github.com/YOUR_GITHUB_USERNAME/bracket-validator.git
```

2. Перейти в каталог

```bash
cd bracket-validator
```

3. Установить зависимости

```bash
composer install
```

3. Запустить утилиту

```bash
php run.php "(5 + 3) * (2 - 1)"
```

Если скобки расставлены правильно, программа выведет:
`Correct brackets placement.`

Если есть ошибка в скобках, программа выведет:
`Incorrect brackets placement.`

# Запуск тестов (PHPUnit)

Проверить работоспособность кода можно с помощью тестов:

```bash
php vendor/bin/phpunit tests
```

При успешном прохождении тестов появится примерно вот такое сообщение:

```bash
OK (5 tests, 12 assertions)
```

Если что-то сломано, PHPUnit сообщит об ошибке.

# CI/CD с Travis CI

Проект настроен для автоматического тестирования с Travis CI.Каждый раз при пуше изменений в GitHub тесты запускаются автоматически.

### Бейдж статуса сборки

Зелёный бейдж означает, что код работает.
Красный бейдж означает, что тесты не прошли, и код требует исправлений.

# Примеры работы

Корректные выражения:

`php run.php "5 * (4 - 2)"`

`php run.php "(1 + 2) * (3 + 4)"`

Некорректные выражения:

`php run.php "5 * (4 - 2("`

`php run.php ")("`

# Описание алгоритма работы

В качестве алгоритма проверки используется стек. Элементы добавляются и убираются по принципу "последний пришел — первый вышел" (LIFO).

Когда встречаю (, то кладу его в стек.
Когда встречаю ), то проверяю:
Если стек пуст — значит, нет соответствующей `(`, то есть ошибка.
Если в стеке есть (, то убираю её, так как есть парная `)`.

В конце проверяю наличие незакрытых незакрытые `(`, если они есть, то в коде ошибка.

### Примеры работы алгоритма:

**"5 \* (4 - 2)"**

( - добавляю в стек

) - убираю из стека

Стек пуст - ошибок нет

---

**"5 \* (4 - 2("**

( - добавляю в стек

Стек в конце не пуст - есть ошибка
