<?php 
/**
* @version      4.9.1 13.08.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');

$in_row = $this->config->product_count_related_in_row;
	 foreach($this->product->extra_field as $extra_field){
		if ($extra_field['id'] == 10){
			if ($extra_field['value'] == 'Русский'){
				$lang = 'белорусском';
			}
			if ($extra_field['value'] == 'Белорусский'){
				$lang = 'русском';
			}
		}
	}
?>
<?php if (count($this->related_prod)){?>    
    <div class="uk-margin-large-bottom uk-text-bold uk-related-title">
        <?php echo 'Это произведение есть на '.$lang.' языке';?>
    </div>
    <div class="jshop_list_product">
        <div class = "jshop list_related">
            <?php foreach($this->related_prod as $k=>$product) : ?>        
                <?php if ($k % $in_row == 0) : ?>
                    <div class = "row-fluid">
                <?php endif; ?>
            
                <div class="">
                    <div class="jshop_related block_product">
                        <?php include(dirname(__FILE__)."/../".$this->folder_list_products."/".$product->template_block_product);?>
                    </div>
                </div>

                <?php if ($k % $in_row == $in_row - 1) : ?>
                    <div class = "clearfix"></div>
                    </div>
                <?php endif; ?>
                
            <?php endforeach; ?>
            
            <?php if ($k % $in_row != $in_row - 1) : ?>
                <div class = "clearfix"></div>
                </div>
            <?php endif; ?>
    </div>
<?php }?>