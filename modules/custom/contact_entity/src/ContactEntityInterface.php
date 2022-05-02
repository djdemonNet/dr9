<?php

namespace Drupal\contact_entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a contact entity entity type.
 */
interface ContactEntityInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
