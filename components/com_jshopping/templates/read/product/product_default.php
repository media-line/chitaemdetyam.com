<?php
/**
* @version      4.10.2 05.11.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/ 
defined('_JEXEC') or die('Restricted access');
$product = $this->product;
include(dirname(__FILE__)."/load.js.php");
?>
<div class="jshop productfull" id="comjshop">
    <form class="uk-clearfix" name="product" method="post" action="<?php print $this->action?>" enctype="multipart/form-data" autocomplete="off">
		<div class="uk-h1 uk-margin-large-bottom uk-text-bold">
			<?php print $this->product->name?>
		</div>
		
		<?php /*
		сервис https://issuu.com/
		<div data-configid="23322691/33029469" style="width:100%; height:500px;" class="issuuembed"></div>
		<script type="text/javascript" src="//e.issuu.com/embed.js" async="true"></script>
		

		сервис https://ru.scribd.com/
		<iframe class="scribd_iframe_embed" src="https://www.scribd.com/embeds/310878708/content?start_page=1&view_mode=slideshow&access_key=key-4yIU9d159uLwZx9U5mjf&show_recommendations=false" data-auto-height="false" data-aspect-ratio="0.707221350078493" scrolling="no" id="doc_51768" width="100%" height="600" frameborder="0"></iframe>
		*/?>
		<?php if (count($this->attributes)) : ?>
		<?php foreach($this->attributes as $attribut) : ?>
			<?php if ($attribut->attr_id == 4): ?>
				<div class = "uk-grid uk-grid-collapse">
					<div class="uk-width-1-1">
						<span class="attributes_name">Выберите художника:</span>
						
						<ul data-uk-switcher="{connect:'#hudozhniki', animation: 'fade'}" class="uk-tabs-list">
							<?php
							$attributess = $this->product->getAttributes();
							$datas = $this->product->getAttributesDatas();
							foreach ($datas['attributeValues'][4] as $data){
								echo '<li><a href="" id="tab'.$data->val_id.'">'.$data->value_name.'</a></li>';
							}?>
						</ul>
						<ul id="hudozhniki" class="uk-switcher">
							<?php
                                foreach ($datas['attributeValues'][4] as $data){
                                    foreach ($attributess as $attribute){
                                        if ($attribute->attr_4 == $data->val_id){?>
                                            <li id="tab<?php echo $attribute->attr_4; ?>">
                                                <iframe width="100%" height="550px" src="http://online.fliphtml5.com/lgsw/<?php echo $attribute->ean;?>/#p=1" frameborder="0" allowfullscreen allowtransparency></iframe>
                                            </li>
                                    <?php }
                                    }
                                ?>
								
							<?php } ?>
						</ul>
						
					</div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
		<?php endif; ?>
		<?php foreach($this->product->extra_field as $extra_field){?>
			<?php/* if ($extra_field['id'] == 7){?>
				<div class="uk-width-1-1">
					<iframe width="100%" height="550px" src="http://online.fliphtml5.com/civc/<?php echo $extra_field['value'];?>/#p=1" frameborder="0" allowfullscreen allowtransparency></iframe>
				</div>
			<?php }*/?>
		<?php }?>
		<?php /*
		Текущий просмотрщик www.yumpu.com
		<?php foreach($this->product->extra_field as $extra_field){?>
			<?php if ($extra_field['id'] == 7){?>
				<div class="uk-width-1-1">
					<iframe width="100%" height="566px" src="https://www.yumpu.com/xx/embed/view/<?php echo $extra_field['value'];?>" frameborder="0" allowfullscreen="true"  allowtransparency="true"></iframe>
				</div>
			<?php }?>
		<?php }?>
		*/?>
        <?php print $this->_tmp_product_html_start;?>
        
        <?php if ($this->config->display_button_print) print printContent();?>

        <?php include(dirname(__FILE__)."/ratingandhits.php");?>
        <?php /*<div class="jshop uk-align-left">
            <div class="image_middle uk-full-image">
                <?php print $this->_tmp_product_html_before_image;?>
                <?php if ($product->label_id){?>
                    <div class="product_label">
                        <?php if ($product->_label_image){?>
                            <img src="<?php print $product->_label_image?>" alt="<?php print htmlspecialchars($product->_label_name)?>" />
                        <?php }else{?>
                            <span class="label_name"><?php print $product->_label_name;?></span>
                        <?php }?>
                    </div>
                <?php }?>
                
                <?php if (count($this->videos)){?>
                    <?php foreach($this->videos as $k=>$video){?>
                        <?php if ($video->video_code){ ?>
                            <div style="display:none" class="video_full" id="hide_video_<?php print $k?>"><?php echo $video->video_code?></div>
                        <?php } else { ?>
                            <a style="display:none" class="video_full" id="hide_video_<?php print $k?>" href=""></a>
                        <?php } ?>
                    <?php } ?>
                <?php }?>

                <span id='list_product_image_middle'>
                    <?php print $this->_tmp_product_html_body_image?>
                    
                    <?php if(!count($this->images)){?>
                        <img id = "main_image" src = "<?php print $this->image_product_path?>/<?php print $this->noimage?>" alt = "<?php print htmlspecialchars($this->product->name)?>" />
                    <?php }?>
                    
                    <?php foreach($this->images as $k=>$image){?>
                        <a class="lightbox" id="main_image_full_<?php print $image->image_id?>" href="<?php print $this->image_product_path?>/<?php print $image->image_full;?>" <?php if ($k!=0){?>style="display:none"<?php }?> title="<?php print htmlspecialchars($image->_title)?>">
                            <img id = "main_image_<?php print $image->image_id?>" src = "<?php print $this->image_product_path?>/<?php print $image->image_name;?>" alt="<?php print htmlspecialchars($image->_title)?>" title="<?php print htmlspecialchars($image->_title)?>" />
							<?php /*
							<div class="text_zoom">
                                <img src="<?php print $this->path_to_image?>search.png" alt="zoom" />
                                <?php print _JSHOP_ZOOM_IMAGE?>
                            </div>
							*//*?>
                        </a>
                    <?php }?>
                </span>
                
                <?php print $this->_tmp_product_html_after_image;?>

                <?php if ($this->config->product_show_manufacturer_logo && $this->product->manufacturer_info->manufacturer_logo!=""){?>
                <div class="manufacturer_logo">
                    <a href="<?php print SEFLink('index.php?option=com_jshopping&controller=manufacturer&task=view&manufacturer_id='.$this->product->product_manufacturer_id, 2);?>">
                        <img src="<?php print $this->config->image_manufs_live_path."/".$this->product->manufacturer_info->manufacturer_logo?>" alt="<?php print htmlspecialchars($this->product->manufacturer_info->name);?>" title="<?php print htmlspecialchars($this->product->manufacturer_info->name);?>" border="0" />
                    </a>
                </div>
                <?php }?>
            </div>
            
            <div class = "jshop_img_description">
                <?php print $this->_tmp_product_html_before_image_thumb;?>
                
                <span id='list_product_image_thumb'>
                    <?php if ( (count($this->images)>1) || (count($this->videos) && count($this->images)) ) {?>
                        <?php foreach($this->images as $k=>$image){?>
                            <img class="jshop_img_thumb uk-full-images" src="<?php print $this->image_product_path?>/<?php print $image->image_thumb?>" alt="<?php print htmlspecialchars($image->_title)?>" title="<?php print htmlspecialchars($image->_title)?>" onclick="showImage(<?php print $image->image_id?>)" />
                        <?php }?>
                    <?php }?>
                </span>
                
                <?php print $this->_tmp_product_html_after_image_thumb;?>
                
                <?php if (count($this->videos)){?>
                    <?php foreach($this->videos as $k=>$video){?>
                        <?php if ($video->video_code) { ?>
                            <a href="#" id="video_<?php print $k?>" onclick="showVideoCode(this.id);return false;"><img class="jshop_video_thumb" src="<?php print $this->video_image_preview_path."/"; if ($video->video_preview) print $video->video_preview; else print 'video.gif'?>" alt="video" /></a>
                        <?php } else { ?>
                            <a href="<?php print $this->video_product_path?>/<?php print $video->video_name?>" id="video_<?php print $k?>" onclick="showVideo(this.id, '<?php print $this->config->video_product_width;?>', '<?php print $this->config->video_product_height;?>'); return false;"><img class="jshop_video_thumb" src="<?php print $this->video_image_preview_path."/"; if ($video->video_preview) print $video->video_preview; else print 'video.gif'?>" alt="video" /></a>
                        <?php } ?>
                    <?php } ?>
                <?php }?>
                
                <?php print $this->_tmp_product_html_after_video;?>                
            </div>
        </div>
		*/?>
		
		<?php if (is_array($this->product->extra_field)){?>
            <div class="uk-full-description">
			<?php if ($this->config->product_show_manufacturer && $this->product->manufacturer_info->name!=""){?>
				<div class="uk-grid uk-grid-collapse">
					<div class="uk-width-1-3">Автор: </div>
					<div class="uk-width-1-2 uk-width-66"><?php print $this->product->manufacturer_info->name?></div>
				</div>
			<?php }?>
            <?php foreach($this->product->extra_field as $extra_field){?>
				<?php $arr = array(7,8,19,20,21,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,6,17);
					if (in_array($extra_field['id'], $arr)){} else{?>
					<?php if ($extra_field['grshow']){?>
						<div class='block_efg'>
						<div class='extra_fields_group uk-text-bold'><?php print $extra_field['groupname']?></div>
					<?php }?>
					
					<div class="extra_fields_el uk-grid uk-grid-collapse">
						<div class="uk-width-1-3">
						<?php// if($extra_field['id'] != 18) { ?>
							<?php print $extra_field['name'];?>:
						<?php// } ?>
						</div>
						<?php /* if ($extra_field['description']){?> 
							<span class="extra_fields_description">
								<?php print $extra_field['description'];?>
							</span><?php } */?>
						<div class="uk-width-2-3">
							<?php print $extra_field['value'];?>
						</div>
					</div>
					
				<?php }?>
            <?php }?>
					<?php if (count($this->attributes)) : ?>
					<?php 
						/*$attributes = $this->product->getAttributes();
						$attributeValues1 = $this->product->getAttribValue(1);// В рб, В рф		
						$attributeValues2 = $this->product->getAttribValue(2);//все возраста			
						foreach ($attributes as $attribute){
							foreach($attributeValues1 as $attributeValue){
								if($attributeValue->val_id == $attribute->attr_1){
									echo $attributeValue->value_name;
								}
							}
							foreach($attributeValues2 as $attributeValue){
								if($attributeValue->val_id == $attribute->attr_2){
									echo $attributeValue->value_name;
								}
							}
						}*/
						//if($extra_field['id'] == 18) { 
					?>
						<div class="jshop_prod_attributes jshop ">
							<?php foreach($this->attributes as $attribut) : ?>
							<?php $attrArr = array(4);
								if (!in_array($attribut->attr_id, $attrArr)): ?>
								<?php if ($attribut->grshow){?>
									<div class="uk-margin-small-top">
										<span class="attributgr_name"><?php print $attribut->groupname?></span>
									</div>
								<?php }?>               
								<div class = "uk-grid uk-grid-collapse">
									<div class="uk-width-1-3 attributes_title">
										<span class="attributes_name"><?php print $attribut->attr_name?>:</span>
										<span class="attributes_description"><?php print $attribut->attr_description;?></span>
									</div>
									<div class = "uk-width-1-3">
										<span id='block_attr_sel_<?php print $attribut->attr_id?>'>
											<?php print $attribut->selects?>
										</span>
									</div>
								</div>
							<?php endif; ?>
							<?php endforeach; ?>
						</div>
					<?php //} ?>
					<?php endif; ?>
			
						<div class="uk-full-image uk-grid">
						<div class="uk-width-1-3"></div>
						<div class="uk-width-2-3">
						<span id='list_product_image_middle'>
							<?php print $this->_tmp_product_html_body_image?>
							<?php /*if(!count($this->images)){?>
								<a id="main_image_full_<?php print $image->image_id?>" href="<?php print $this->image_product_path?>/<?php print $this->noimage?>" <?php if ($k!=0){?>style="display:none"<?php }?> title="<?php print htmlspecialchars($image->_title)?>" data-lightbox-type="image" data-uk-lightbox="on">
									<img id = "main_image" src = "<?php print $this->image_product_path?>/<?php print $this->noimage?>" alt = "<?php print htmlspecialchars($this->product->name)?>" />
								</a>
							<?php }*/?>
							
							<?php foreach($this->images as $k=>$image){?>
								<a id="main_image_full_<?php print $image->image_id?>" href="<?php print $this->image_product_path?>/<?php print $image->image_full;?>" <?php if ($k!=0){?>style="display:none"<?php }?> title="<?php print htmlspecialchars($image->_title)?>" data-lightbox-type="image" data-uk-lightbox="on">
									<img id = "main_image_<?php print $image->image_id?>" src = "<?php print $this->image_product_path?>/<?php print $image->image_name;?>" alt="<?php print htmlspecialchars($image->_title)?>" title="<?php print htmlspecialchars($image->_title)?>" />
									
								</a>
							<?php }?>
						</span>
						</div>
						</div>
			
			
				<div class="uk-margin-medium-top uk-margin-bottom">
					<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
					<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
					<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter,linkedin" data-counter=""></div>
				</div>
            </div>
        <?php }?>
        
		<div class="jshop_prod_description uk-full-description uk-margin-remove">
            <?php print $this->product->description; ?>
        </div>    
		
		<?php foreach($this->product->extra_field as $extra_field){?>
			<?php if ($extra_field['id'] == 8){?>
				<a class="uk-button uk-button-small uk-full-downloadbtn" href="/images/books/<?php echo $extra_field['value'];?>" download>Скачать текст</a>
			<?php }?>
		<?php }?>	
		
		<!-- Диафильм 1 -->
		<?php foreach($this->product->extra_field as $extra_field){?>
			<?php if ($extra_field['id'] == 91){?>
				<div class="uk-h2 uk-text-black uk-margin-large-top">
					Диафильм:<br>
					<?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 90){?>
				<?php 
					$trackId = $extra_field['value'];
				?>
				<div class="uk-margin-bottom uk-margin-top">
					<object width="480" height="390"><param name="movie" value="http://diafilmy.su/diafilm2.swf?id=<?php echo $trackId;?>&t=2"><param name="allowFullScreen" value="true"><embed src="http://diafilmy.su/diafilm2.swf?id=<?php echo $trackId;?>&t=2" type="application/x-shockwave-flash" width="480" height="390" allowFullScreen="true" ></embed></object>
				</div>
			<?php }?>
			<?php/* if ($extra_field['id'] == 66){?>
				<div class="uk-text-black">
					Издательство: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 67){?>
				<div class="uk-text-black">
					Год: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 68){?>
				<div class="uk-text-black">
					Озвучивает: <?php echo $extra_field['value'];?>
				</div>
			<?php } */?>
			<?php if ($extra_field['id'] == 92){?>
				<div class="uk-text-black">
					Примечание: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
		<?php }?>
		<!-- Диафильм 1 конец -->
		
		<?php 
		foreach($this->product->extra_field as $extra_field){?>
		
			<?php 
			//фильм 1
			if (($extra_field['id'] == 80) && ($extra_field['value'] != '')){?>
				<div class="uk-h2 uk-text-black uk-margin-large-top uk-margin-bottom">Фильм:<br>
				<?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php 
			if ($extra_field['id'] == 19){
				$pos = strripos($extra_field['value'], '/') + 1;
				?>
				<div class="uk-margin-large-top uk-margin-bottom">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo substr($extra_field['value'], $pos);?>" frameborder="0" allowfullscreen></iframe>
				</div>
			<?php }?>
			<?php if ($extra_field['id'] == 24){?>
				<div class="uk-text-black">
					<?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 70){?>
				<div class="uk-text-black">
					<?php echo $extra_field['name'];?>: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<!-- // фильм 1 конец -->
			<?php 
			//фильм 2
			if (($extra_field['id'] == 81) && ($extra_field['value'] != '')){?>
				<div class="uk-h2 uk-text-black uk-margin-large-top uk-margin-bottom"><?php echo $extra_field['value'];?>
				</div>
			<?php } 
			if ($extra_field['id'] == 28){
				$pos = strripos($extra_field['value'], '/') + 1;
				?>
				<div class="uk-margin-large-top uk-margin-bottom">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo substr($extra_field['value'], $pos);?>" frameborder="0" allowfullscreen></iframe>
				</div>
			<?php }?>
			<?php if ($extra_field['id'] == 31){?>
				<div class="uk-text-black uk-margin-large-bottom">
				<?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 72){?>
				<div class="uk-text-black">
					<?php echo $extra_field['name'];?>: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<!-- // фильм 2 конец -->
			<?php 
			//фильм 3
			if (($extra_field['id'] == 82) && ($extra_field['value'] != '')){?>
				<div class="uk-h2 uk-text-black uk-margin-top uk-margin-large-bottom"><?php echo $extra_field['value'];?>
				</div>
			<?php } 
			if ($extra_field['id'] == 40){
				$pos = strripos($extra_field['value'], '/') + 1;
				?>
				<div class="uk-margin-large-top uk-margin-bottom">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo substr($extra_field['value'], $pos);?>" frameborder="0" allowfullscreen></iframe>
				</div>
			<?php }?>
			<?php if ($extra_field['id'] == 41){?>
				<div class="uk-text-black uk-margin-large-bottom">
				<?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 74){?>
				<div class="uk-text-black">
					<?php echo $extra_field['name'];?>: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<!-- // фильм 3 конец -->
			<?php 
			//фильм 4
			if (($extra_field['id'] == 83) && ($extra_field['value'] != '')){?>
				<div class="uk-h2 uk-text-black uk-margin-top uk-margin-large-bottom"><?php echo $extra_field['value'];?>
				</div>
			<?php } 
			if ($extra_field['id'] == 42){
				$pos = strripos($extra_field['value'], '/') + 1;
				?>
				<div class="uk-margin-large-top uk-margin-bottom">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo substr($extra_field['value'], $pos);?>" frameborder="0" allowfullscreen></iframe>
				</div>
			<?php }?>
			<?php if ($extra_field['id'] == 43){?>
				<div class="uk-text-black uk-margin-large-bottom">
				<?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 76){?>
				<div class="uk-text-black">
					<?php echo $extra_field['name'];?>: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<!-- // фильм 4 конец -->
			<?php 
			//фильм 5
			if (($extra_field['id'] == 84) && ($extra_field['value'] != '')){?>
				<div class="uk-h2 uk-text-black uk-margin-top uk-margin-large-bottom"><?php echo $extra_field['value'];?>
				</div>
			<?php } 
			if ($extra_field['id'] == 44){
				$pos = strripos($extra_field['value'], '/') + 1;
				?>
				<div class="uk-margin-large-top uk-margin-bottom">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo substr($extra_field['value'], $pos);?>" frameborder="0" allowfullscreen></iframe>
				</div>
			<?php }?>
			<?php if ($extra_field['id'] == 45){?>
				<div class="uk-text-black uk-margin-large-bottom">
					<?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 78){?>
				<div class="uk-text-black">
					<?php echo $extra_field['name'];?>: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<!-- // фильм 5 конец -->
		<?php }?>	
		<?php
		foreach($this->product->extra_field as $extra_field){?>		
			<?php 	
			//мультфильм 1
			if (($extra_field['id'] == 85) && ($extra_field['value'] != '')){?>
				<div class="uk-h2 uk-text-black uk-margin-large-top uk-margin-bottom">Мультфильм:<br> <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
		<?php 
			if ($extra_field['id'] == 20){
				$pos = strripos($extra_field['value'], '/') + 1;
				?>
				<div class="uk-margin-top uk-margin-large-bottom">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo substr($extra_field['value'], $pos);?>" frameborder="0" allowfullscreen></iframe>
				</div>
			<?php }?>
			<?php if ($extra_field['id'] == 25){?>
				<div class="uk-text-black uk-margin-large-bottom">
				<?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 71){?>
				<div class="uk-text-black">
					<?php echo $extra_field['name'];?>: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<!-- // мультфильм 1 конец -->
			<?php 
			//мультфильм 2
			if (($extra_field['id'] == 86) && ($extra_field['value'] != '')){?>
				<div class="uk-h2 uk-text-black uk-margin-top uk-margin-large-bottom"><?php echo $extra_field['value'];?>
				</div>
			<?php } 
			if ($extra_field['id'] == 32){
				$pos = strripos($extra_field['value'], '/') + 1;
				?>
				<div class="uk-margin-top uk-margin-large-bottom">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo substr($extra_field['value'], $pos);?>" frameborder="0" allowfullscreen></iframe>
				</div>
			<?php }?>
			<?php if ($extra_field['id'] == 39){?>
				<div class="uk-text-black uk-margin-large-bottom">
				<?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 73){?>
				<div class="uk-text-black">
					<?php echo $extra_field['name'];?>: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<!-- // мультфильм 2 конец -->
			<?php 
			//мультфильм 3
			if (($extra_field['id'] == 87) && ($extra_field['value'] != '')){?>
				<div class="uk-h2 uk-text-black uk-margin-top uk-margin-large-bottom"><?php echo $extra_field['value'];?>
				</div>
			<?php } 
			if ($extra_field['id'] == 46){
				$pos = strripos($extra_field['value'], '/') + 1;
				?>
				<div class="uk-margin-top uk-margin-large-bottom">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo substr($extra_field['value'], $pos);?>" frameborder="0" allowfullscreen></iframe>
				</div>
			<?php }?>
			<?php if ($extra_field['id'] == 47){?>
				<div class="uk-text-black uk-margin-large-bottom">
				<?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 75){?>
				<div class="uk-text-black">
					<?php echo $extra_field['name'];?>: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<!-- // мультфильм 3 конец -->
			<?php 
			//мультфильм 4
			if (($extra_field['id'] == 88) && ($extra_field['value'] != '')){?>
				<div class="uk-h2 uk-text-black uk-margin-top uk-margin-large-bottom"><?php echo $extra_field['value'];?>
				</div>
			<?php } 
			if ($extra_field['id'] == 48){
				$pos = strripos($extra_field['value'], '/') + 1;
				?>
				<div class="uk-margin-top uk-margin-large-bottom">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo substr($extra_field['value'], $pos);?>" frameborder="0" allowfullscreen></iframe>
				</div>
			<?php }?>
			<?php if ($extra_field['id'] == 49){?>
				<div class="uk-text-black uk-margin-large-bottom">
				<?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 77){?>
				<div class="uk-text-black">
					<?php echo $extra_field['name'];?>: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<!-- // мультфильм 4 конец -->
			<?php 
			//мультфильм 5
			if (($extra_field['id'] == 89) && ($extra_field['value'] != '')){?>
				<div class="uk-h2 uk-text-black uk-margin-top uk-margin-large-bottom"><?php echo $extra_field['value'];?>
				</div>
			<?php } 
			if ($extra_field['id'] == 50){
				$pos = strripos($extra_field['value'], '/') + 1;
				?>
				<div class="uk-margin-top uk-margin-large-bottom">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo substr($extra_field['value'], $pos);?>" frameborder="0" allowfullscreen></iframe>
				</div>
			<?php }?>
			<?php if ($extra_field['id'] == 51){?>
				<div class="uk-text-black uk-margin-large-bottom">
				<?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 79){?>
				<div class="uk-text-black">
					<?php echo $extra_field['name'];?>: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<!-- // мультфильм 5 конец -->
		<?php }?>	
		<!-- аудио книга 1 -->
		<?php foreach($this->product->extra_field as $extra_field){?>
			<?php if ($extra_field['id'] == 26){?>
				<div class="uk-h2 uk-text-black uk-margin-large-top">
					Аудиокнига:<br>
					<?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 21){?>
				<?php 
					$trackId = $extra_field['value'];
					$trackIdLength = mb_strlen($trackId);
				?>
				<div class="uk-margin-bottom uk-margin-top">
					<?php if($trackIdLength < 7):?>
						<object width="240" height="80"><param name="movie" value="http://staroeradio.ru/sr-player32.swf"></param><param name="flashvars" value="mp3ID=<?php echo $trackId;?>"><param name="allowFullScreen" value="false"></param><param name="allowscriptaccess" value="always"></param><embed src="http://staroeradio.ru/sr-player32.swf" flashvars="mp3ID=<?php echo $trackId;?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="false" width="240" height="80"></embed></object>
					<?php else :?>
						<iframe width="560px" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $trackId;?>&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
					<?php endif;?>
				</div>
			<?php }?>
			<?php if ($extra_field['id'] == 27){?>
				<div class="uk-text-black">
					Издательство: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 29){?>
				<div class="uk-text-black">
					Год: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 30){?>
				<div class="uk-text-black">
					Озвучивает: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 23){?>
				<div class="uk-text-black">
					Примечание: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
		<?php }?>
		<!-- аудио книга 1 конец -->
		<!-- аудио книга 2 -->
		<?php foreach($this->product->extra_field as $extra_field){?>
			<?php if ($extra_field['id'] == 35){?>
				<div class="uk-h2 uk-text-black uk-margin-large-top">
					<?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 33){?>
				<?php 
					$trackId = $extra_field['value'];
					$trackIdLength = mb_strlen($trackId);
				?>
				<div class="uk-margin-bottom uk-margin-top">
					<?php if($trackIdLength < 7):?>
						<object width="240" height="80"><param name="movie" value="http://staroeradio.ru/sr-player32.swf"></param><param name="flashvars" value="mp3ID=<?php echo $trackId;?>"><param name="allowFullScreen" value="false"></param><param name="allowscriptaccess" value="always"></param><embed src="http://staroeradio.ru/sr-player32.swf" flashvars="mp3ID=<?php echo $trackId;?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="false" width="240" height="80"></embed></object>
					<?php else :?>
						<iframe width="560px" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $trackId;?>&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
					<?php endif;?>
				</div>
			<?php }?>
			<?php if ($extra_field['id'] == 36){?>
				<div class="uk-text-black">
					Издательство: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 37){?>
				<div class="uk-text-black">
					Год: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 38){?>
				<div class="uk-text-black">
					Озвучивает: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 34){?>
				<div class="uk-text-black">
					Примечание: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			
		<?php }?>
		<!-- аудио книга 2 конец -->
		<!-- аудио книга 3 -->
		<?php foreach($this->product->extra_field as $extra_field){?>
			<?php if ($extra_field['id'] == 54){?>
				<div class="uk-h2 uk-text-black uk-margin-large-top">
					<?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 52){?>
				<?php 
					$trackId = $extra_field['value'];
					$trackIdLength = mb_strlen($trackId);
				?>
				<div class="uk-margin-bottom uk-margin-top">
					<?php if($trackIdLength < 7):?>
						<object width="240" height="80"><param name="movie" value="http://staroeradio.ru/sr-player32.swf"></param><param name="flashvars" value="mp3ID=<?php echo $trackId;?>"><param name="allowFullScreen" value="false"></param><param name="allowscriptaccess" value="always"></param><embed src="http://staroeradio.ru/sr-player32.swf" flashvars="mp3ID=<?php echo $trackId;?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="false" width="240" height="80"></embed></object>
					<?php else :?>
						<iframe width="560px" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $trackId;?>&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
					<?php endif;?>
				</div>
			<?php }?>
			<?php if ($extra_field['id'] == 55){?>
				<div class="uk-text-black">
					Издательство: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 56){?>
				<div class="uk-text-black">
					Год: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 57){?>
				<div class="uk-text-black">
					Озвучивает: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 53){?>
				<div class="uk-text-black">
					Примечание: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
		<?php }?>
		<!-- аудио книга 3 конец -->
		<!-- аудио книга 4 -->
		<?php foreach($this->product->extra_field as $extra_field){?>
			<?php if ($extra_field['id'] == 59){?>
				<div class="uk-h2 uk-text-black uk-margin-large-top">
					<?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 58){?>
				<?php 
					$trackId = $extra_field['value'];
					$trackIdLength = mb_strlen($trackId);
				?>
				<div class="uk-margin-bottom uk-margin-top">
					<?php if($trackIdLength < 7):?>
						<object width="240" height="80"><param name="movie" value="http://staroeradio.ru/sr-player32.swf"></param><param name="flashvars" value="mp3ID=<?php echo $trackId;?>"><param name="allowFullScreen" value="false"></param><param name="allowscriptaccess" value="always"></param><embed src="http://staroeradio.ru/sr-player32.swf" flashvars="mp3ID=<?php echo $trackId;?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="false" width="240" height="80"></embed></object>
					<?php else :?>
						<iframe width="560px" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $trackId;?>&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
					<?php endif;?>
				</div>
			<?php }?>
			<?php if ($extra_field['id'] == 60){?>
				<div class="uk-text-black">
					Издательство: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 61){?>
				<div class="uk-text-black">
					Год: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 62){?>
				<div class="uk-text-black">
					Озвучивает: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 63){?>
				<div class="uk-text-black">
					Примечание: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
		<?php }?>
		<!-- аудио книга 4 конец -->
		<!-- аудио книга 5 -->
		<?php foreach($this->product->extra_field as $extra_field){?>
			<?php if ($extra_field['id'] == 65){?>
				<div class="uk-h2 uk-text-black uk-margin-large-top">
					<?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 64){?>
				<?php 
					$trackId = $extra_field['value'];
					$trackIdLength = mb_strlen($trackId);
				?>
				<div class="uk-margin-bottom uk-margin-top">
					<?php if($trackIdLength < 7):?>
						<object width="240" height="80"><param name="movie" value="http://staroeradio.ru/sr-player32.swf"></param><param name="flashvars" value="mp3ID=<?php echo $trackId;?>"><param name="allowFullScreen" value="false"></param><param name="allowscriptaccess" value="always"></param><embed src="http://staroeradio.ru/sr-player32.swf" flashvars="mp3ID=<?php echo $trackId;?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="false" width="240" height="80"></embed></object>
					<?php else :?>
						<iframe width="560px" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $trackId;?>&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
					<?php endif;?>
				</div>
			<?php }?>
			<?php if ($extra_field['id'] == 66){?>
				<div class="uk-text-black">
					Издательство: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 67){?>
				<div class="uk-text-black">
					Год: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 68){?>
				<div class="uk-text-black">
					Озвучивает: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
			<?php if ($extra_field['id'] == 69){?>
				<div class="uk-text-black">
					Примечание: <?php echo $extra_field['value'];?>
				</div>
			<?php } ?>
		<?php }?>
		<!-- аудио книга 5 конец -->
		
		
		
		</div> <?php// Явно лишний див?>
		
        <?php/* if ($this->product->product_url!=""){?>
            <div class="prod_url">
                <a target="_blank" href="<?php print $this->product->product_url;?>"><?php print _JSHOP_READ_MORE?></a>
            </div>
        <?php } */?>

        <?php /* print $this->_tmp_product_html_before_atributes;?>

        
        
        <?php print $this->_tmp_product_html_after_atributes;?>

        <?php if (count($this->product->freeattributes)){?>
            <div class="prod_free_attribs jshop">
                <?php foreach($this->product->freeattributes as $freeattribut){?>
                    <div class = "row-fluid">
                        <div class="span2 name">
                            <span class="freeattribut_name"><?php print $freeattribut->name;?></span>
                            <?php if ($freeattribut->required){?><span>*</span><?php }?>
                            <span class="freeattribut_description"><?php print $freeattribut->description;?></span>
                        </div>
                        <div class="span10 field">
                            <?php print $freeattribut->input_field;?>
                        </div>
                    </div>
                <?php }?>
                <?php if ($this->product->freeattribrequire) {?>
                    <div class="requiredtext">* <?php print _JSHOP_REQUIRED?></div>
                <?php }?>
            </div>
        <?php }?>
        
        <?php print $this->_tmp_product_html_after_freeatributes;?>

        <?php/* if ($this->product->product_is_add_price){?>
            <div class="price_prod_qty_list_head"><?php print _JSHOP_PRICE_FOR_QTY?></div>
            <table class="price_prod_qty_list">
                <?php foreach($this->product->product_add_prices as $k=>$add_price){?>
                    <tr>
                        <td class="qty_from" <?php if ($add_price->product_quantity_finish==0){?>colspan="3"<?php } ?>>
                            <?php if ($add_price->product_quantity_finish==0) print _JSHOP_FROM?>
                            <?php print $add_price->product_quantity_start?> 
                            <?php print $this->product->product_add_price_unit?>
                        </td>
                        
                        <?php if ($add_price->product_quantity_finish > 0){?>
                            <td class="qty_line"> - </td>
                        <?php } ?>
                        
                        <?php if ($add_price->product_quantity_finish > 0){?>
                            <td class="qty_to">
                                <?php print $add_price->product_quantity_finish?> <?php print $this->product->product_add_price_unit?>
                            </td>
                        <?php } ?>
                        
                        <td class="qty_price">            
                            <span id="pricelist_from_<?php print $add_price->product_quantity_start?>">
                                <?php print formatprice($add_price->price)?><?php print $add_price->ext_price?>
                            </span> 
                            <span class="per_piece">/ <?php print $this->product->product_add_price_unit?></span>
                        </td>
                    </tr>
                <?php }?>
            </table>
        <?php }?>

        <?php if ($this->product->product_old_price > 0){?>
            <div class="old_price">
                <?php print _JSHOP_OLD_PRICE?>: 
                <span class="old_price" id="old_price">
                    <?php print formatprice($this->product->product_old_price)?>
                    <?php print $this->product->_tmp_var_old_price_ext;?>
                </span>
            </div>
        <?php }?>

        <?php if ($this->product->product_price_default > 0 && $this->config->product_list_show_price_default){?>
            <div class="default_price"><?php print _JSHOP_DEFAULT_PRICE?>: <span id="pricedefault"><?php print formatprice($this->product->product_price_default)?></span></div>
        <?php }?>
        
        <?php print $this->_tmp_product_html_before_price;?>

        <?php if ($this->product->_display_price){?>
            <div class="prod_price">
                <?php print _JSHOP_PRICE?>: 
                <span id="block_price">
                    <?php print formatprice($this->product->getPriceCalculate())?>
                    <?php print $this->product->_tmp_var_price_ext;?>
                </span>
            </div>
        <?php }?>
        
        <?php print $this->product->_tmp_var_bottom_price;?>

        <?php if ($this->config->show_tax_in_product && $this->product->product_tax > 0){?>
            <span class="taxinfo"><?php print productTaxInfo($this->product->product_tax);?></span>
        <?php }?>
        
        <?php if ($this->config->show_plus_shipping_in_product){?>
            <span class="plusshippinginfo"><?php print sprintf(_JSHOP_PLUS_SHIPPING, $this->shippinginfo);?></span>
        <?php }?>
        
        <?php if ($this->product->delivery_time != ''){?>
            <div class="deliverytime" <?php if ($product->hide_delivery_time){?>style="display:none"<?php }?>><?php print _JSHOP_DELIVERY_TIME?>: <?php print $this->product->delivery_time?></div>
        <?php }?>
        
        <?php if ($this->config->product_show_weight && $this->product->product_weight > 0){?>
            <div class="productweight"><?php print _JSHOP_WEIGHT?>: <span id="block_weight"><?php print formatweight($this->product->getWeight())?></span></div>
        <?php }?>

        <?php if ($this->product->product_basic_price_show){?>
            <div class="prod_base_price"><?php print _JSHOP_BASIC_PRICE?>: <span id="block_basic_price"><?php print formatprice($this->product->product_basic_price_calculate)?></span> / <?php print $this->product->product_basic_price_unit_name;?></div>
        <?php }?>
        
        <?php print $this->product->_tmp_var_bottom_allprices;?>

        
        <?php print $this->_tmp_product_html_after_ef;?>

        <?php if ($this->product->vendor_info){?>
            <div class="vendorinfo">
                <?php print _JSHOP_VENDOR?>: <?php print $this->product->vendor_info->shop_name?> (<?php print $this->product->vendor_info->l_name." ".$this->product->vendor_info->f_name;?>),
                ( 
                <?php if ($this->config->product_show_vendor_detail){?><a href="<?php print $this->product->vendor_info->urlinfo?>"><?php print _JSHOP_ABOUT_VENDOR?></a>,<?php }?> 
                <a href="<?php print $this->product->vendor_info->urllistproducts?>"><?php print _JSHOP_VIEW_OTHER_VENDOR_PRODUCTS?></a> )
            </div>
        <?php }?>

        <?php if (!$this->config->hide_text_product_not_available){ ?>
            <div class = "not_available" id="not_available"><?php print $this->available?></div>
        <?php }?>

        <?php if ($this->config->product_show_qty_stock){?>
            <div class="qty_in_stock">
                <?php print _JSHOP_QTY_IN_STOCK?>: 
                <span id="product_qty"><?php print sprintQtyInStock($this->product->qty_in_stock);?></span>
            </div>
        <?php }?>

        <?php print $this->_tmp_product_html_before_buttons;?>
        
        <?php if (!$this->hide_buy){?>                         
            <div class="prod_buttons" style="<?php print $this->displaybuttons?>">
                
                <div class="prod_qty">
                    <?php print _JSHOP_QUANTITY?>:
                </div>
                
                <div class="prod_qty_input">
                    <input type="text" name="quantity" id="quantity" onkeyup="reloadPrices();" class="inputbox" value="<?php print $this->default_count_product?>" /><?php print $this->_tmp_qty_unit;?>
                </div>
                        
                <div class="buttons">            
                    <input type="submit" class="btn btn-primary button" value="<?php print _JSHOP_ADD_TO_CART?>" onclick="jQuery('#to').val('cart');" />
                    
                    <?php if ($this->enable_wishlist){?>
                        <input type="submit" class="btn button" value="<?php print _JSHOP_ADD_TO_WISHLIST?>" onclick="jQuery('#to').val('wishlist');" />
                    <?php }?>
                    
                    <?php print $this->_tmp_product_html_buttons;?>
                </div>
                
                <div id="jshop_image_loading" style="display:none"></div>
            </div>
        <?php }?>
        
        <?php print $this->_tmp_product_html_after_buttons;*/?>

        <input type="hidden" name="to" id='to' value="cart" />
        <input type="hidden" name="product_id" id="product_id" value="<?php print $this->product->product_id?>" />
        <input type="hidden" name="category_id" id="category_id" value="<?php print $this->category_id?>" />
    </form>

    <?php print $this->_tmp_product_html_before_demofiles; ?>
    
    <div id="list_product_demofiles"><?php include(dirname(__FILE__)."/demofiles.php");?></div>
    
    <?php if ($this->config->product_show_button_back){?>
        <div class="button_back">
            <input type="button" class="btn button" value="<?php print _JSHOP_BACK;?>" onclick="<?php print $this->product->button_back_js_click;?>" />
        </div>
    <?php }?>
	<?php/* foreach($this->product->extra_field as $extra_field){?>
        <?php if ($extra_field['id'] == 7){?>
			<div class="uk-width-1-1">
				<iframe width="100%" height="566px" src="https://www.yumpu.com/xx/embed/view/<?php echo $extra_field['value'];?>" frameborder="0" allowfullscreen="true"  allowtransparency="true"></iframe>
			</div>
        <?php }?>
    <?php }*/?>
    
    <div class="uk-related-wrapper uk-width-1-1">
    <?php
        print $this->_tmp_product_html_before_review;
        include(dirname(__FILE__)."/review.php");
        
        print $this->_tmp_product_html_before_related;
        include(dirname(__FILE__)."/related.php");
    ?>
    </div>
    <?php print $this->_tmp_product_html_end;?>
</div>