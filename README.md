# Drupal 8 Testing Example Application

This example application demonstrates unit and functional testing in Drupal 8.

## Requirements

* Drush 8.x

## Setup

1. Clone this repo and navigate into the directory
2. Run `drush dl drupal-8.1.x` to install Drupal 8
3. Navigate into newly created directory (`cd drupal-8.1.x-dev`)
4. Run `drush qd --use-existing --uri=http://localhost:8383 --profile=standard` to initialize the Drupal 8 application


## Unit Tests

1. Run `php core/scripts/run-tests.sh --url http://localhost:8383/ --class "Drupal\Tests\test_example\Unit\TestExampleConversionsTest"`

## Functional Tests
