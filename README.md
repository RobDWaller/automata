[![CircleCI](https://circleci.com/gh/RobDWaller/automata/tree/master.svg?style=svg)](https://circleci.com/gh/RobDWaller/automata/tree/master) [![SonarCloud](https://sonarcloud.io/api/project_badges/measure?project=RobDWaller_automata&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=RobDWaller_automata) [![SonarCloud](https://sonarcloud.io/api/project_badges/measure?project=RobDWaller_automata&metric=coverage)](https://sonarcloud.io/dashboard?id=RobDWaller_automata)
# Automata

An Elementary Cellular Automata library for PHP. All credit goes to Stephen Wolfram and Melanie Mitchell.

## Basic Usage

```php
use Automata\CellsFactory;
use Automata\RulesFactory;
use Automata\Iterator;

$$cellsFactory = new CellsFactory();
$cells = $cellsFactory->create("01010");

$rulesFactory = new RulesFactory();
$rules = $rulesFactory->create(110);

$iterator = new Iterator(new Iterate(), $cells, $rules);

$iterations = $iterator->iterate(4);

$iterations->toArray();
```

## Rules

```
000 = 0
001 = 1
010 = 1
011 = 1
100 = 0
101 = 1
110 = 1
111 = 0
```