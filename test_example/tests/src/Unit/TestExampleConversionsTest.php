<?php

/**
 * @file
 *
 * Contains \Drupal\Tests\test_example\Unit\TestExampleConversionsTest.
 */

namespace Drupal\Tests\test_example\Unit;

use Drupal\Tests\UnitTestCase;

/**
 * Demonstrates how to write tests.
 *
 * @group test_example
 */
class TestExampleConversionsTest extends UnitTestCase {

  /**
   * @var \Drupal\test_example\TestExampleConversions
   */
  public $conversionService;

  public function setUp() {
    $this->conversionService = new \Drupal\test_example\TestExampleConversions();
  }

  /**
   * A simple test that tests our celsiusToFahrenheit() function.
   *
   * @dataProvider providerCelsiusToFarenheit
   */
  public function testOneConversion($celsius, $expectedFarenheit) {
    // Confirm that 0C = 32F.
    $this->assertEquals($celsius, $this->conversionService->celsiusToFahrenheit($expectedFarenheit));
  }

  /**
   *	Provides temperatures to test conversion.
   *
   * @return array
   */
  public function providerCelsiusToFarenheit() {
    return [
      [32, 0],
      [95, 35]
    ];
  }

}
