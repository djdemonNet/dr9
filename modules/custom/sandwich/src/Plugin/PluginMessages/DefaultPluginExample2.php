<?php

/**
 * @file
 * Пример плагина.
 */

namespace Drupal\sandwich\Plugin\PluginMessages;

use Drupal\sandwich\Annotation\PluginMessages;
use Drupal\sandwich\PluginMessagesPluginBase;

/**
 * @PluginMessages(
 *   id="default_plugin_example_2",
 * )
 */
class DefaultPluginExample2 extends PluginMessagesPluginBase
{

  /**
   * Возвращаем сообщение данного плагина.
   */
  public function getMessage()
  {
    return 'This is message from Example #2';
  }

  /**
   * {@inheritdoc}
   */
  public function getMessageType()
  {
    return 'error';
  }

  /**
   * {@inheritdoc}
   */
  public function getPages()
  {
    return [
      '/node/*',
      '/contact',
      '<front>',
    ];
  }
}
