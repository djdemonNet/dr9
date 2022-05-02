<?php

namespace Drupal\dummy\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Returns responses for Dummy routes.
 */
class DummyController extends ControllerBase
{

  /**
   * Builds the response.
   */
  public function build()
  {
    $element['head']= array(
      '#markup' => '<h2>This page was created with halp DummyController in dummy module</h2></br>',
    );

    $element['link']= array(
      '#markup' => $this->dummy_get_string_link('dummy.display_node', '3'),
    );
    // Link to an internal path defined by a route.
    return $element;
  }
  /**
   * Displays private page
   */
  public function privatePage()
  {
    $buildPrivatePage['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('This is private page '),
    ];
    return $buildPrivatePage;
  }
  /**
   * Custom function for return string link
   */
  function dummy_get_string_link($route, $number)
  {
    $link = Link::createFromRoute('Node number 3', $route, ['node' => $number]);
    return $link->toString();
  }
}
