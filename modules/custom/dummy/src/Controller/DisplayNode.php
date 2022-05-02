<?php

namespace Drupal\dummy\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Access\AccessResult;
use Drupal\node\NodeInterface;

/**
 * Returns responses for Dummy routes.
 */
class DisplayNode extends ControllerBase
{

  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public function content(NodeInterface $node)
  {
    $element = array(
      '#markup' => '<h2>This page was created with halp DisplayNode Controller in dummy module</h2>' . $node->body->value,
    );

    return $element;
  }

  /**
   * Checks access for this controller.
   */
  public function access(NodeInterface $node)
  {
    $user = \Drupal::currentUser();
    if ($node->getType() == 'article' && !in_array('authenticated', $user->getRoles())) {
      return AccessResult::forbidden();
    }
    return AccessResult::allowed();
  }

  /**
   * Returns a page title.
   */
  public function getTitle(NodeInterface $node)
  {
    return $node->getTitle();
  }
}
