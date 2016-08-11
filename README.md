# Drupal 8 Testing Example Application

This example application demonstrates unit and functional testing in Drupal 8.

The tests are examples provided by Acquia: https://docs.acquia.com/articles/drupal-8-unit-testing

## Requirements

* Drush 8.x

## Setup

1. Clone this repo and navigate into the directory
2. Run `drush dl drupal-8.1.x` to install Drupal 8
3. Navigate into newly created directory (`cd drupal-8.1.x-dev`)
4. Run `drush qd --use-existing --uri=http://localhost:8383 --profile=standard` to initialize the Drupal 8 application
5. Run `drush en simpletest` to install Simpletest
6. Run `cp -r ../test_example modules` to add the `test_example` module to the dev application


## Unit Tests

Run `php core/scripts/run-tests.sh --color --verbose --module test_example`

The `Drupal\Tests\test_example\Unit\TestExampleConversionsTest` test demonstrates a unit test of a Drupal 8 service as well as a PHPUnit data provider.

The `test_example` module does not need to be enabled for the unit test to run. The `Drupal\Tests\test_example\Unit\TestExampleConversionsTest` class is instantiated manually in the test and the autoloader picks it up automatically.

## Functional Tests
