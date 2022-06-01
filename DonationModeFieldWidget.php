<?php

namespace Drupal\donation_mode\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Field\Annotation\FieldWidget;

/**
 *
 *@FieldWidget(
 *   id = "donation_mode_widget",
 *   field_types = { 
 *    "donation_mode"
 *   }
 *   )
 */
 
 class DonationModeFieldWidget extends WidgetBase{
	 
	 public function formElement(FieldItemListInterface $items, $delta, Array $elememt, Array &$form, FormStateInterface $form_state ){
		 $element['mode'] = array(
		 '#type' => 'select',
		 '#title' => t('Donation Mode'),
		 '#default_value' => isset($items[$delta]->mode) ? $items[$delta]->mode : NULL,
		 '#empty_value' => '',
		 '#options' => ['online' => 'Online', 'offline' => 'Offline'],
		 );
		 
		 $field_name = $items->getName();
		 $element['medium'] = array(
		 '#type' => 'radios',
		 '#title' => t('Choose Donation Medium'),
		 '#default_value' => isset($items[$delta]->medium) ? $items[$delta]->medium : NULL, 
		 '#empty_value' => '',
		 '#options' => ['cash' => 'Cash', 'cheque' => 'Cheque'],
		 '#states' => [
		 'visible' => [
		 ':input[name="'. $field_name . '[' . $delta . '][mode]"]' => ['value' => 'offline' ],
		 ],
		 'required' => [
		 ':input[name="'. $field_name . '[' . $delta . '][mode]"]' => ['value' => 'offline' ],
		 ],
		 ],
		 );
		 return $element;
		 
	 }
		 
 }