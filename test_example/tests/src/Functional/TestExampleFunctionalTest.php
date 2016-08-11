<?php
/**
 * @file
 *
 * Contains \Drupal\Tests\test_example\Unit\TestExampleConversionsTest.
 */

namespace Drupal\Tests\test_example\Functional;

use Drupal\simpletest\BrowserTestBase;

/**
 * Ensure that the simpletest_example content type provided functions properly.
 *
 * The TestExampleFunctionalTest is a functional test case, meaning that it
 * actually exercises a particular sequence of actions through the web UI.
 * The majority of core test cases are done this way, but the SimpleTest suite
 * also provides unit tests as demonstrated in the unit test case example later
 * in this file.
 *
 * Functional test cases are far slower to execute than unit test cases because
 * they require a complete Drupal install to be done for each test.
 *
 * @see Drupal\simpletest\WebTestBase
 * @see SimpleTestUnitTestExampleTestCase
 *
 * @ingroup test_example
 *
 * SimpleTest uses group annotations to help you organize your tests.
 *
 * @group test_example
 * @group examples
 */
class TestExampleFunctionalTest extends BrowserTestBase {

  /**
   * Test node creation through the user interface.
   *
   * Creates a node using the node/add form and verifies its consistency in
   * the database.
   */
  public function testSimpleTestExampleCreate() {
    // Create a user.
    $user = $this->drupalCreateUser([], NULL, TRUE);
    // Log in our user.
    $this->drupalLogin($user);

    // Create a node using the node/add form.
    $edit = [];
    $edit['title[0][value]'] = $this->randomMachineName(8);
    $edit['body[0][value]'] = $this->randomMachineName(16);
    $this->drupalPostForm('node/add/article', $edit, t('Save and publish'));

    // Check that our article node has been created.
    $this->assertText(t('@post @title has been created.', [
      '@post' => 'Article',
      '@title' => $edit['title[0][value]'],
    ]));
    // Check that the node exists in the database.
    $node = $this->drupalGetNodeByTitle($edit['title[0][value]']);
    $this->assertTrue($node, 'Node found in database.');

    // Verify 'submitted by' information. Drupal adds a newline in there, so
    // we have to check for that.
    $submitted_by = t("Submitted by @username\n on @datetime", [
      '@username' => $this->loggedInUser->getUsername(),
      '@datetime' => format_date($node->getCreatedTime()),
    ]);

    $this->drupalGet('node/' . $node->id());
    $this->assertText($submitted_by);
  }

}
