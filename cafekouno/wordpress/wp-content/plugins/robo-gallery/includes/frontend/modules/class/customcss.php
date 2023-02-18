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

if ( ! defined( 'WPINC' ) ) exit;

class  roboGalleryModuleCustomCss extends roboGalleryModuleAbstraction{
	
	public function init(){
		if( $customCss = $this->getMeta('cssStyle') ) $this->core->setContent( $customCss, 'CssBefore');		
	}
}