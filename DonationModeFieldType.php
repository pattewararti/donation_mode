<?php

namespace Drupal\donation_mode\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Field\Annotation\FieldType;


/**
 *
 *@FieldType(
 *  id = "donation_mode",
 *  label = @Translation("DonationMode"),
 *  category = @Translation("Custom"),
 *  default_widget = "donation_mode_widget",
 *  default_formatter = "donation_mode_formatter"
 *  )
 */
 
 
 class DonationModeFieldType extends FieldItemBase {
	 
	 public static function propertyDefinitions(FieldStorageDefinitionInterface $storage){
	 
	 $properties = [];
	 $properties['mode'] = DataDefinition::create('string')->setLabel(t('Medium'));
	 return $properties;
	 
	 }
	 
	 public static function schema(FieldStorageDefinitionInterface $storage){
		 
		 $columns = [];
		 $columns['mode'] = [
		 'type' => 'varchar',
		 'length' => 30,
		 ];
		 $columns['medium'] = [
		 'type' => 'varchar',
		 'length' => 30,
		 ];
		 return [
		 'columns' => $columns,
		 'indexes' => [],
		 ];
	 } 
	 public function inEmpty(){
		 
		 $isEmpty = empty($this->get('mode')->getValue()) && empty($this->get('medium')->getValue());
		 
		 return $isEmpty;
	 }
		 
	 
 }
