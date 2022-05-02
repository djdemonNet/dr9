<?php

namespace Drupal\dummy\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Dummy settings for this site.
 */
class SettingsDummyForm extends ConfigFormBase
{

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'dummy_settings_dummy';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames()
  {
    return ['dummy.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $config = $this->config('dummy.settings');

    $form['name_administrator'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name Administrator'),
      '#default_value' => $config->get('name_administrator'),
    ];

    $form['sex_administrator'] = array(
      '#type' => 'radios',
      '#title' => $this
        ->t('Sex administrator'),
      '#default_value' => $config->get('sex_administrator'),
      '#options' => array(
        0 => $this
          ->t('M'),
        1 => $this
          ->t('W'),
      ),
    );
    $form['date_birthday_administrator'] = array(
      '#type' => 'date',
      '#title' => $this
        ->t('Bithday date'),
      '#default_value' => $config->get('date_birthday_administrator'),
    );
    $form['favorite_color_administrator'] = array(
      '#type' => 'color',
      '#title' => $this
        ->t('Favorite Color'),
      '#default_value' => $config->get('favorite_color_administrator'),
    );
    $form['email_administrator'] = array(
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#default_value' => $config->get('email_administrator'),
    );
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state)
  {
    if ($form_state->getValue('name_administrator') == '') {
      $form_state->setErrorByName('name_administrator', $this->t('The ' . $form_state->getValue('name_administrator') . ' value is not correct.'));
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $this->config('dummy.settings')
      ->set('name_administrator', $form_state->getValue('name_administrator'))
      ->set('sex_administrator', $form_state->getValue('sex_administrator'))
      ->set('date_birthday_administrator', $form_state->getValue('date_birthday_administrator'))
      ->set('favorite_color_administrator', $form_state->getValue('favorite_color_administrator'))
      ->set('email_administrator', $form_state->getValue('email_administrator'))
      ->save();
    parent::submitForm($form, $form_state);
  }
}
