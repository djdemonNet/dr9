<?php

namespace Drupal\dummy\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a greetings block.
 *
 * @Block(
 *   id = "dummy_greetings",
 *   admin_label = @Translation("Greetings Dummy Block"),
 *   category = @Translation("Custom")
 * )
 */
class GreetingsDummyBlock extends BlockBase
{

  /**
   * {@block}
   */
  public function build()
  {
    $config = $this->getConfiguration();

    if (!empty($config['dummy_greetings_dummy_block_settings'])) {
      $text = $this->t('Hello @Name in block!', ['@Name' => $config['dummy_greetings_dummy_block_settings']]);
    } else {
      $text = $this->t('Hello incognito in block! </br> You can write your name  if you change settings this block');
    }

    return [
      '#markup' => $text,
    ];
  }

  /**
   * {@block}
   */
  protected function blockAccess(AccountInterface $account)
  {
    return AccessResult::allowedIfHasPermission($account, 'access content');
  }

  /**
   * {@block}
   */
  public function blockForm($form, FormStateInterface $form_state)
  {
    $config = $this->getConfiguration();

    $form['dummy_greetings_dummy_block_settings'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your Name, Herr ))'),
      '#description' => $this->t('Who do you want to say hello to?'),
      '#default_value' => !empty($config['dummy_greetings_dummy_block_settings']) ? $config['dummy_greetings_dummy_block_settings'] : '',
    ];

    return $form;
  }

  /**
   * {@block}
   */
  public function blockSubmit($form, FormStateInterface $form_state)
  {
    $this->configuration['dummy_greetings_dummy_block_settings'] = $form_state->getValue('dummy_greetings_dummy_block_settings');
  }
}
