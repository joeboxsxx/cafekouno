<?php
/* 
*      Robo Gallery     
*      Version: 3.2.12 - 28800
*      By Robosoft
*
*      Contact: https://robogallery.co/ 
*      Created: 2021
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php

 */

class roboGalleryFieldsFieldSelectMultiple extends roboGalleryFieldsField{

	protected function normalize($values){
		if (!is_array($values)) {
			$values = array();
		}

		foreach ($values as $key => $value) {
			$values[$key] = parent::normalize($value);
		}
		
		return $values;
	}
}
