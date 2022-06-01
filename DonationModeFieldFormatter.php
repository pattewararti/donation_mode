<?php

namespace Drupal\donation_mode\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Field\Annotation\FieldFormatter;

/**
 *@FieldFormatter(
 * id = "donation_mode_formatter",
 * label = @Translation("Donation Mode"),
 * field_types = {"donation_mode"}
 *)
*/

class DonationModeFieldFormatter extends FormatterBase{
	
	public function viewElements(FieldItemListInterface $items, $langcode)
	
	{
		$elements = [];
		foreach($items as $delta => $item){
			$elements[$delta] = [
			'#type' => 'markup',
			'#markup' => $item->mode . ',' . $item->medium,
			
			];
		}
		return $elements;
	}
}