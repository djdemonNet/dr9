<?php

namespace Drupal\dummy\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Psr\Container\ContainerInterface;

/**
 * Provides a dummypage block.
 *
 * @Block(
 *   id = "dummy_dummypage",
 *   admin_label = @Translation("DummyPage"),
 *   category = @Translation("Custom")
 * )
 */
class DummypageBlock extends BlockBase
{
  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $config = $this->getConfiguration();
    dump($config);

    $query = \Drupal::entityQuery('node');
    // Использование условий, чтобы получить список опубликованных статей.
    $node_ids = $query
      ->condition('type', 'article')
      ->condition('status', 1)
      // как только мы указали наши условия, мы используем метод execute () для запуска запроса
      ->execute();

    dump($node_ids);

    $query = \Drupal::entityQuery('node');
    //Get all entity for page NODE number load
    $node = \Drupal::entityTypeManager()->getStorage("node")->load(3);

    dump($node);
    $body_text = $node->body->value;
    dump($body_text);

    $body_text = $node->get('body')->value;
    $body_array = $node->body->getValue();

    dump($body_array);
    $build['content'] = [
      '#markup' => $node->body->value,
    ];
    // This code for Create new page =)
    //    $node = \Drupal::entityTypeManager()->getStorage('node')->create(['type' => 'page', 'title' => 'TEST PAGE ']);
    //    $node->save();

    return $build;
  }
}
