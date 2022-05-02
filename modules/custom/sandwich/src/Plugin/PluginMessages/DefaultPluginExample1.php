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
 *   id="default_plugin_example_1",
 * )
 */
class DefaultPluginExample1 extends PluginMessagesPluginBase
{

  /**
   * Возвращаем сообщение данного плагина.
   */
  public function getMessage()
  {
    return 'This is message from Example #1';
  }
}
