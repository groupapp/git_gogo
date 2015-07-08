	
	<!--  TEST ONLY by Seung -->
	<!-- 
	<div class="test-only container">
	
		<span></span>
	
	</div>
	-->
				
	<!-- Amazon Scroller js START -->
	<script language="javascript" type="text/javascript">

	




		$(function() {
			$("#amazon_scroller1").amazon_scroller({
				scroller_title_show: 'enable',
				scroller_time_interval: '4000',
				scroller_window_background_color: "#CCC",
				scroller_window_padding: '10',
				scroller_border_size: '1',
				scroller_border_color: '#000',
				scroller_images_width: '124',
				scroller_images_height: '160',
				scroller_title_size: '12',
				scroller_title_color: 'black',
				scroller_show_count: '4',
				directory: 'images'
			});
			$("#amazon_scroller2").amazon_scroller({
				scroller_title_show: 'disable',
				scroller_time_interval: '3000',
				scroller_window_background_color: "none",
				scroller_window_padding: '10',
				scroller_border_size: '0',
				scroller_border_color: '#CCC',
				scroller_images_width: '100',
				scroller_images_height: '80',
				scroller_title_size: '12',
				scroller_title_color: 'black',
				scroller_show_count: '2',
				directory: 'images'
			});
			$("#amazon_scroller3").amazon_scroller({
				scroller_title_show: 'enable',
				scroller_time_interval: '3000',
				scroller_window_background_color: "none",
				scroller_window_padding: '10',
				scroller_border_size: '2',
				scroller_border_color: '#9C6',
				scroller_images_width: '124',
				scroller_images_height: '160',
				scroller_title_size: '11',
				scroller_title_color: 'black',
				scroller_show_count: '5',
				directory: 'images'
			});
		});
	</script>
	<!-- Amazon Scroller js END -->
	
	
	<script>
		jQuery('a.gallery').colorbox();
	</script>

	
	
	
	<?php	
		$pageTitle 	= "";
		$qty 		= 1;
		
		if ($arrGet[0][0]=="pid") {
			$DB = new myDB;
			$pid = $arrGet[0][1];
			$strSQL = "SELECT * FROM Products WHERE ProductID=".$pid." AND IsActive=\"Y\"";
			$DB->query($strSQL);
			if ($DB->rows) {
				$data = $DB->fetch_array($DB->res);
				$productname	= $data["ProductName"];
				$pagepath		= "<p class=\"path-info\"><a href=\"?c1=".$data["Cat1ID"]."\">".$DB->getCatID(1,$data["Cat1ID"])."</a></p></strong><span>/</span></li><li><strong>".$DB->getCatID(2,$data["Cat2ID"])."</strong></li>";
	?>


	<!--script type="text/JavaScript" src="/js/cloud-zoom.1.0.3.min.js"></script-->
	<script type="text/javascript" src="/js/jquery.jqtransform.js"></script>

                   
	<!-- Button trigger modal -->
	<!--button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	  Launch demo modal
	</button-->
	
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!--
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Modal title</h4>
				</div>
				-->
				
				<div class="modal-body nopadding">
					<img id="modal-largeimage" src="" />
				</div>
				
				<!--
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
				-->
			  
			</div>
		</div>
	</div>
                    
				
					<div class=" container" style="margin-bottom:100px; padding: 0 !important;">
						<div class="page-path">
							<ul>
								<li class="home"><a href="/" title="Go to Home Page">Home</a><span>/ </span></li>
								<li class="home"><strong><?php echo $pagepath?></strong></li>
							</ul>
						</div>
						
                        <div class="col-xs-12">
							<div class="alert">
								<div class="inner_alert"><?php echo $productname?> was added to your shopping cart.<button></button></div>
							</div>
							<div class="row">
								<form action="" method="post" id="" name="" onsubmit="return false">
									
									
									
									<!-- .product-imgbox BEGIN -->
									<div class="product-imgbox col-md-8 col-xs-12" style="padding: 0 !important;width: 76.6667%;">
									
											
											
										<div class="col-md-12 qslider-container" style="padding: 0 !important;">
											<div class="thumbnail-container">
                                            	                                              
												<ul>
												<?php 
													for ($i=1; $i<26; $i++) {
														if ($data["Picture".$i]!="") {
															$thumb_class = ($i%5==1) ? " class=\"first\"" : null;
												?>
													<li class="qslider-thumb"><div style="background: url(<?php echo PRODUCT_IMAGE_PATH.$data["Picture".$i];?>);" image-data="<?php echo PRODUCT_IMAGE_PATH.$data["Picture".$i];?>"></div></li>
													<?php
														}
													}
												?>
												</ul>
												<img class="thumbs-up" src="/images/up.png" />
                                                <img class="thumbs-down" src="/images/down.png" />  

											</div>
											<div class="bigimage-container">
											
												<img class="thumbs-left" src="/images/left.png" />
												<img class="thumbs-right" src="/images/right.png" />
												
												<div></div>											
											</div>
										</div>	
											
											
									</div>
									<!-- .product-imgbox END -->
									
									
									
									
									
									
									
									
									
									
									
									<div class="product-shop col-md-4 col-xs-12" style="width: 23.3333%;">
										<table class="product-options" style="width:243px;">
										<tr>
										<td>Name</td><td><?php echo $productname;?></td>
										</tr>
										<?php if($data["BrandName"]){?>
										<tr>
										<td>Brand</td><td><?php echo $data["BrandName"];?></td>
										</tr>
										<?php }?>
										<tr>
										<td>Style No</td><td><?php echo $data["StyleNo"];?></td>
										</tr>
										</table>
										<!--<div class="product-name">
											<h2><?php echo $productname;
								//			if ($data["new"]==1){
								//				echo "<img src=\"/images/new50.gif\"/ style=\"margin-left: 10px;\"/>";
								//			}
											?>					
											</h2>
										</div>
										<div class="product-desc"><?php //echo $data["ProductDescription"]?></div>
										<?php if($data["BrandName"]){?>
										<p style="font-weight: normal; color: #2F2F2F;">Brand: <b><?php echo $data["BrandName"];?></b></p>
										<?php }?>
										<p><span style="font-weight: normal; color: #2F2F2F;">Style No:</span> <?php echo $data["StyleNo"];?></p>
										<!--<p class="availability instock">
											This item is made <strong>FOR <?php echo strtoupper($data["ForMenOrWomen"])?></strong>
										</p>-->
<?php 		if(trim($data["NoticeToPurchasers"])!=""){?>
										<div class="preorder">
											<?php echo nl2br($data["NoticeToPurchasers"])?>
										</div>
<?php 		}
			if($data["IsThisBackOrderItem"]=="Y"){
?>	
										<div class="backorder">
											This item is <span><b>for PRE-ORDER(or BACK-ORDER) only</b></span> and to be shipped later when it is available if you order it now. <u>You will NOT be charged for this item until we actually have it in stock, even though your order invoice or receipt shows the amount for this item.</u> 
										</div>								
<?php 
			}
			if (!empty($data["SizeChartID"]) || $data["ColorIDs"]!="1" ) {
			 
?>										
										<script type="text/javascript">
											//apiTest();
										</script>
										<div class="product-options">
											<dl>										
<?php 
				if (!empty($data["SizeChartID"]) ) {
//					
				//if ($data["SizeChartID"] != 136){
				$sizes = $DB->getSizeRun($data["SizeChartID"]);
					$DB7 = new myDB;
					$smallSQL1 = "SELECT * FROM Size WHERE `SizeChartID` = ".$data["SizeChartID"];
					//echo $smallSQL1;
					$DB7->query($smallSQL1);
					if ($DB7->rows) {

						$data7 = $DB7->fetch_array($DB7->res);																
						$tsize=  $data7["SizeChartName"];
					
?>										
												<dt><label class="required"><!--<em>*</em>-->Size:</label>&nbsp;&nbsp;<!--<a href="/?info=sizechart#<?php echo $data["BrandName"]?>" target="_blank;">View Size Chart</a>--><?php echo $tsize?></dt>
												<!--<dd>
													<div class="jqTransformSelect">
														<div class="validation-advice" id="advice-required-entry-select_1" style="display:none">This is a required field.</div>
													</div>
												</dd>-->
<?php 
				     }
			}	

				
				if (!empty($data["PackChartID"]) ) {
//					
				//if ($data["SizeChartID"] != 136){
				$sizes = $DB->getSizeRun($data["PackChartID"]);
					$DB11 = new myDB;
					$larSQL1 = "SELECT * FROM Pack WHERE PackChartID = ".$data["PackChartID"];
					//echo $smallSQL1;
					$DB11->query($larSQL1);
					if ($DB11->rows) {

						$data11 = $DB11->fetch_array($DB11->res);																
						$tpack=  $data11["PackChartName"];
					
?>										
												<dt><label class="required"><!--<em>*</em>-->Pack:</label>&nbsp;&nbsp;<!--<a href="/?info=sizechart#<?php echo $data["BrandName"]?>" target="_blank;">View Size Chart</a>--><?php echo $tpack?><input type="hidden" id="tsize" name="tsize" value="<?php echo $tsize."(".$tpack.")"?>"></dt>
												<!--<dd>
													<div class="jqTransformSelect">
														<div class="validation-advice" id="advice-required-entry-select_1" style="display:none">This is a required field.</div>
													</div>
												</dd>-->
<?php 
				     }
			}	

				
				if ($data["ColorIDs"]!="1") {
					$colors = $DB->getColorRun($data["ColorIDs"]);
				}	
				
?>
<?php
			$DBchk = new myDB();			
			if(count($colors)>0){	
							
?>	
						<!--<dt><label class="required"><em>*</em>Color:</label></dt>-->
						<table> 
						<tr>
						<td style="width:10%;">Color</td><td style="text-align: center;width:10%;">Pack</td><td>&nbsp;</td><td style="text-align: center;width:20%;">Unit</td><td>&nbsp;</td><td style="text-align: center;width:30%;">Price</td>
						</tr>
						<input  type="hidden" id="PrepackQuantity" name="PrepackQuantity" value="<?php echo $data["PrepackQuantity"]?>">
															
			<?php 					
				for ($i=0; $i<count($colors); $i++) {

							
							$strSQLchk = "SELECT * FROM TProductColors WHERE ProductID=".$data["ProductID"]." and Color = '".$colors[$i]."'";
							$DBchk->query($strSQLchk);

							while ($datachk = $DBchk->fetch_array($DBchk->res)){
								$Instock=$datachk["Instock"];
							}


							$xname= trim(str_replace(' ','',$colors[$i]));
							$yname= trim(str_replace('/','',$xname));
			?>
			
								<input  type="hidden" id="fill_<?php echo $yname?>" name="fill[]" value="">
								<tr><td style="padding:3px;width:10%;"><span id=""><?php echo $colors[$i]?></span><!--<input  type="text" id="bulk_color_3" name="bulk_color1[]" value="<?php echo $colors[$i]?>">--></td>
			<?php if($Instock=='Y') {?>									
								<td style="padding:3px;width:10%;"><input  type="number" id="bulk_<?php echo $yname?>" name="bulkcolor[]"  onchange="fill('<?php echo $yname?>')" style="text-align:right;width:40px;" maxlength="3" min="0" max="999" value="0" title="Qty"  /></td><td style="padding:3px;">X</td><td style="padding:3px;width:10%;"><?php echo $data["PrepackQuantity"]?></td><td style="padding:3px;width:10%;">=$</td><td style="padding:3px;width:30%;"><input  type="text" readonly id="price_<?php echo $yname?>" name="qty" value="0" readonly style="text-align:right;width:60px;" /></td>
			<?php }?>
			<?php if($Instock=='N') {?>
								<td style="color:red;text-align: center;" colspan="5">Sold out<td>
			<?php }?>
								</tr>

			<?php 
				}			
			?>
							<tr><td style="padding:3px;">Total</td><td style="padding:3px;"><input  type="text" readonly id="total_qty" name="total_qty" value="0" style="text-align:right;width:40px;" /></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td style="padding:3px;width:30%;"><input  type="text" readonly id="total_price" name="total_price" value="0"  style="text-align:right;width:60px;"/></td></tr>
							</table>							
									
							
			<?php 
					} else {
						
						$DB19 = new myDB;
						$YSQL1 = "SELECT * FROM `ProductColors` WHERE `ProductID` = ".$data["ProductID"];
						$DB19->query($YSQL1);
						if($DB19->rows>0)
						{
							echo "<dt><label class=\"required\"><em>*</em>Color:</label></dt>";
							echo "<dd>";
							echo "<div class=\"jqTransformSelect\">";
							echo "<select name=\"color\" id=\"color\">";
							echo "<option>-- Please Select2 --</option>";
							
							for ($j=1; $j<16; $j++) {
							
							$imagechk=$data["Picture".$j];
							
								if ($imagechk!="")
								{
									$DB10 = new myDB;
									$XSQL1 = "SELECT * FROM `ProductColors` WHERE `ProductID` = ".$data["ProductID"]." and imageno=".$j." ORDER BY `Color`";
									$DB10->query($XSQL1);
									
									$colorname="";
									while ($data10 = $DB10->fetch_array($DB10->res)){
										$colorname.=$data10["Color"]." /";
										
									}
									$colorname=substr($colorname,0,strlen($colorname)-2);
									echo "<option value=\"" .$colorname."\">".$colorname."</option>";
									
								}
							}
							echo "</select>";
							echo "<div class=\"validation-advice\" id=\"advice-required-entry-select_2\" style=\"display:none\">This is a required field.</div>";
							echo "</div>";
							echo "</dd>";
						}
					}
				
				echo "</dl>";
				//}	
			?>
											
											
											
											
											
<?php
					if(count($colors)>1){			
?>											
											<p class="required">* Required Fields</p>
<?php 
					}

?>
											
										</div>


										
<?php 
			}
?>			

<!--
<?php
			if ($data["personalize"]=="1" && $data["FeeForPersonalization"]>0) {
				$FeeForPersonalization=$data["FeeForPersonalization"];
?>
										<div class="product-options">	
											<dl>
												<dt>
													<input type="checkbox" id="personalizeit" name="personalizeit" value="Y" /> &nbsp;<label for="personalizeit" class="required">Personalize this item with your name and number?</label>
												</dt>
												<div id="personalarea" style="display:none;">												
												<dt><p>(A Name and a number below to be ironed on this item)</p></dt>
												<dd>&nbsp;</dd>
												<dt>
													<label class="required">Name:<em>*</em></label>
												</dt>
												<dd>
													<input type="text" name="p_name" id="p_name" class="input-text per1" maxlength="15" onkeyup="showName()"/>
													<p>(Up to 15 letters. Ex MESSI or TOURE YAYA)</p>
												</dd>
												<dt>
													<label class="required">Number:<em>*</em></label>
												</dt>
												<dd><input type="text" name="p_number" id="p_number" class="input-text per" maxlength="2" onkeyup="showNumber()"/>
													<p>(Maximum 2 digits EX: 4 or 15)</p>
												</dd>
												<dt>
													<label style="width:180px">Personalization Fee: <em>$<?php echo $FeeForPersonalization?>/ea</em></label>
												</dt>
												<dt>
													<label>Note:</label>
													<b>THIS IS A CUSTOMIZED JERSEY</b> - All customizations may need <u>customized jerseys</u> ship within three(3) business days, howeber,
													they can take additional time to <u>complete</u> before shipping. Most up to 10 business days. All sets are authentic.
													<b>NO RETURNS OR EXCHANGES ARE ALLOWED ON CUSTOMIZED JERSEYS.</b>
												</dt>
												</div>												
											</dl>
										</div>
<?php 
				}
				if($data["League"]=="English Premier League" && $data["FeeForAttachingEmblems"] > 0){
					$leagueImage = str_replace(" ", "", $data["League"]);
?>
										<div class="product-options">
											<div class="emblemImage">
												<img src="/images/LeagueLogos/<?php echo $leagueImage;?>.jpg" />
											</div>
											<div class="emblem">
												<input type="hidden" name="emblemFee" id="emblemFee" value="<?php echo $data["FeeForAttachingEmblems"]?>" />
												<div style="float: left;"><input type="checkbox" id="attachemblem" name="attachemblem" value="Y" /></div>
												<div class="emblemDesc">
													<label for="attachemblem" class="required">Attach a set of 2 <?php echo $data["League"];?> emblems on both sleeves of this jersey for $<?php echo $data["FeeForAttachingEmblems"]?>?</label>
												</div>
											</div>
										</div>
<?php 			}?>
-->
													
			<script type="text/javascript">
				function addwish(id){
			    	window.location ="/lib/wish_action.php?action=add&id="+id;
				}
				function vipmember(){
					alert('Please first login !!');
				    window.location ="/?page=customer&account=login";
				}
			</script>
<!--
<?php 			
		$VIPSQL = "SELECT * FROM FiguresForVIPs ";
		$DB->query($VIPSQL);
		$VIPdata = $DB->fetch_array($DB->res);
		$vipprice=round($data["UnitPriceOnSale"]-($data["UnitPriceOnSale"]*($VIPdata["DiscountPercentageForVIPs"]/100)),2);
		$msrpvipprice=round($data["UnitPrice"]-($data["UnitPrice"]*($VIPdata["DiscountPercentageForVIPs"]/100)),2);
		$saveprice = round($data["UnitPrice"] - $data["UnitPriceOnSale"],2);
?>		
										<div class="product-options-foot" style="padding-bottom: 50px;">
											<div class="addto-cart">
												<div class="pricebox">
													<span id="our_price_display" class="price"><?php echo "$".$data["UnitPriceOnSale"]?></span>
<?php
											if ($data["UnitPriceOnSale"] < $data["UnitPrice"]) {	
												echo "<span class=\"regprice\">($".formatMoney($data["UnitPrice"]).")</span>";
											}?>
													<br/>
													<div class="saveprice">You are saving $<?php echo $saveprice;?>!</div>
<?php 										if ($data["Cat1ID"]!=57) {
												echo "<br />
													<span id=\"vip_price_display\" class=\"price vip-price\">VIP Members: $".formatMoney($vipprice,true)."</span>";
											}
?>
													
											</div>
-->
												
												<span id="totalprice" class="price"></span>		
												<input type="hidden" name="productid" value="<?php echo $data["ProductID"]?>" />
												<div class="qtybox">
													<!--<label for="qty">Qty2:</label>-->
<?php 	if($data["PrepackQuantity"]>0){?>
													<input id="quantity_wanted"  type="hidden" name="qty"   value="<?php echo $data["PrepackQuantity"]?>" title="Qty" class="input-text qty" />
													
<?php 	}else{?>													
													<input id="quantity_wanted"  type="hidden" name="qty"  maxlength="3" min="1" max="99" value="1" title="Qty" class="input-text qty" />
<?php 	} ?>
												</div>
												
                                                                                                <div class="price-options" style="display:block">
												<p>Price:<?php echo "<input type=\"hidden\" id=\"unitprice\" name=\"unitprice\" value=\"".$data["UnitPriceOnSale"]."\"><span style=\"color: #F35;font-size: 18px;font-weight: bold;\" id=\"sale-price\">$".$data["UnitPriceOnSale"]."</span> ";
												if($data["UnitPriceOnSale"]!=$data["UnitPrice"])
												echo"<span style=\"color: #B2B2B2;font-size: 14px;font-weight: normal;text-decoration: line-through;\" id=\"alt-price\">".$data["UnitPrice"]."</span>";?></p>
                                                                                                </div>
                                                                                                <p class="clear"></p>
                                                                                                
												<div>
<?php 
		if ($data["ProductID"]==13911 && empty($_COOKIE["userID"]))
			echo 									"<button type=\"button\" title=\"\" onclick=\"vipmember()\" class=\"button btn-cart\"><span>Add to Cart</span></button>";
		else
			echo 									"<button type=\"button\" title=\"Add to Cart\" id=\"addcart\" class=\"button btn-cart\"><span>Add to Cart</span></button>";
?>
													<span id="ajax_loader" style="display:none"><img src="/images/ajax_loader.gif"/></span>
												</div>
											
                                                                                                <br><br>
											<ul class="addto-links">
												<!--<button type="button" title="Add to Wish" class="button btn-cart"><span>Add to wish</span></button>-->
												<li style="margin-right: 0;">
													<div style="float: left; margin-right: 62px;">
														<a href="#" onclick="addwish(<?php echo $data["ProductID"]?>)" class="link-wishlist">Add to Wishlist</a>
													</div>
													<div class="wishandvip" style="float: right; display:none;">
														<a href="?info=vipinfo" class="viplink" style="text-decoration: none;">
															<button type="button" title="Join VIP" class="button joinvip">
																<span>Join the VIP Club</span>
															</button>
													<!--	<img src="/images/VIP_Club_JoinThe.png" border="0" />-->
														</a>
													</div>
												</li>
												<!--<li><span class="separator">|</span>
													<a href="#" onclick="" class="link-compare">Add to Compare</a>
												</li>-->
												<li><span id="ajax_loading25" style="display:none"><img src="/images/ajax_loader.gif"/></span></li>
											</ul>
                                                                                                
                                                                                    </div>
										</div>
									</div>
								</form>

<?php  if ($data["personalize"]=="2" || $data["QuantityDiscountID"] > 0){?>								
			 					<div class="bulk_order<?php if (($data["Cat1ID"]==17 && $data["Cat2ID"]==109) || $data["QuantityDiscountID"] > 0) echo " bulk_show"; ?>">
									<br/>
									<p>Discount Unit Prices by order quantities over this item: </p>
<?php 
	$strSQL2 = "SELECT P.ProductID, P.QuantityDiscountID, Q.* FROM Products P LEFT JOIN QuantityDiscounts Q ON P.QuantityDiscountID = Q.QD_ID WHERE P.ProductID = ".$pid;
	$DB3 = new myDB;
	$DB3->query($strSQL2);
	$Qtydata = $DB3->fetch_array($DB3->res);
//	echo $strSQL2."<br/>";
?>									
									<table>
										<tbody>
											<tr>
<?php
		for($i=1; $i<=6; $i++){
			if($Qtydata["LowerQty".$i]!=0){
?>
												<th>Qty.</th>
												<th>U. Price</th>
<?php 		}
		}?>

											</tr>
											<tr>
<?php 
		for($i=1; $i<=6; $i++){
			if($Qtydata["LowerQty".$i] > 0){
				echo "<td>".$Qtydata["LowerQty".$i];
				if($Qtydata["UpperQty".$i] > 0){
					echo "~".$Qtydata["UpperQty".$i]."</td>";
				}else{
					echo " +</td>";
				}
				if($Qtydata["DiscountPercentage".$i]!=0){
					$price = $data["UnitPriceOnSale"] - ($data["UnitPriceOnSale"] * ($Qtydata["DiscountPercentage".$i] * 0.01));
					echo "<td>$".formatMoney($price,true)."</td>";
				}else{
					echo "<td>Call us</td>";
				}
			}
		}
?>											
											</tr>
										</tbody>
									</table> 
									<br/>
									<span>
										<input type="checkbox" id="bulk" name="bulk" value="Y" onclick="bulkList('bulk_order_list')"/>
										<label for="bulk" onclick="bulkList('bulk_order_list')">Print number(s) and/or name(s) on back of the jersey(s)?</label>
									</span>
									<div id="bulk_order_list" style="display: none;">
										<form id="frmPrint" method="post" target="myWindow" onsubmit="window.open('', this.target, 'width=950,height=1000,resizable,scrollbars=yes');return true;">
											<input type="hidden" name="bulkRow" value="" />
											<table id="bulk_table">
												<tbody>
													<tr>
														<th style="width: 30px;"></th>
														<th>Size</th>
														<th>Letter Color</th>
														<th style="width: 50px;">Big #</th>
														<th style="width: 50px;">Small #</th>
														<th style="width: 50px;">Shorts #</th>
														<th>Name</th>
													</tr>
													<tr>
														<td>1</td>
														<td><input type="text" id="bulk_size_1" name="bulk_size[]" value="" class="inputbox" /></td>
														<td><input type="text" id="bulk_color_1" name="bulk_color[]" value="" class="inputbox" /></td>
														<td><input type="text" id="bulk_BigNo_1" name="bulk_BigNo[]" value="" maxlength="2" class="inputbox" /></td>
														<td><input type="text" id="bulk_smallNo_1" name="bulk_smallNo[]" value="" maxlength="2" class="inputbox" /></td>
														<td><input type="text" id="bulk_ShortsNo_1" name="bulk_ShortsNo[]" value="" maxlength="2" class="inputbox" /></td>
														<td><input type="text" id="bulk_name_1" name="bulk_name[]" value="" class="inputbox" /></td>
													</tr>
												</tbody>
											</table>
											<button type="button" class="button" id="print_form" style="margin: 10px 0 20px 0;">
												<span>Print this form</span>
											</button>
											<button type="button" id="bulktocart" class="button" style="float: right; margin: 10px 0 20px 0;" >
												<span>Bulk To Cart</span>&nbsp;&nbsp;
											</button>
											<input type="hidden" name="bulk_row" id="bulk_row" value="" />
										</form>
										<br/>
										<p style="clear: both;">Fees for printing numbers and names are as follows:</p>
										<table>
											<tbody>
												<tr>
													<th style="width: 50%;">Numbers / Names</th>
													<th>Unit Price</th>
												</tr>
												<tr>
													<td>Small(Shorts) Numbers</td>
													<td>$1.50 / Number</td>
												</tr>
												<tr>
													<td>Big Numbers</td>
													<td>$2.50 / Number</td>
												</tr>
												<tr>
													<td>Letters for Names</td>
													<td>$1.00 / Letter</td>
												</tr>
											</tbody>
										</table>
									</div>
			 						<br/>
									<br/>
									<p><b>Team Logo:</b> 
									<br/>If you want to print your team or company logo on the jerseys and/or shorts, please e-mail the followings for a price quote to <a href="">info@lemontreeclothing.com</a></p>
									<ol>
										<li>Logo images (of a good quality and size).</li>
										<li>Detailed description of printing the logo.</li>
									</ol>
								</div>
<?php }?>
							</div>
<?php
		}
	}
?>								
						
						</div>

<!-- Notice to buyer -->						
						
							<div class="container product-collateral">
       
            					<ul class="tabs">
            						<li class="first active"><a href="javascript:product_tabselect(1)">Product Description</a></li>
	                                <li><a href="javascript:product_tabselect(2)">Product Reviews</a></li>
	                                <li><a href="javascript:product_tabselect(3)">Size Guide</a></li>
	                                <?php if($data["Cat1ID"]==7 || ($data["Cat1ID"]==38 && $data["Cat2ID"]==200) || ($data["Cat1ID"]==20 && $data["Cat2ID"]==70)){?>
	                                <li><a href="javascript:product_tabselect(4)">Footwear Conversion Tool</a></li>
	                                <?php }?>
	                            </ul>
								<ul class="padder">
									<li class="active">
	                        			<div class="product-tab-info">
    										<?php echo nl2br(strip_tags($data["ProductDescription"]))?><br/>
										</div>
									</li>
									<li>
		                                <div class="product-tab-info">
											<!--  Product Review Contents Here -->
											<h2>RATING &amp REVIEW</h2>
											<div class="review-write" id style>
												<form id="myreview" method="post" action="/lib/review_action.php">
													<input type="hidden" name="pid" value="<?php echo $data["ProductID"];?>"/>
													<input type="hidden" name="rated" value=""/>
													<input type="hidden" name="memid" value="<?php echo !empty($_COOKIE["userID"]);?>"/>
													<ul>
														<li style="display: block;">
															<h4>How would you rate this product?</h4>
															<div class="review-cont">
																<dl class="rating nostar">
																	<dd class="one" style="display: block;">
																		<a href="javascript:void(0);" class="star-select" title="1 Star">1</a>
																	</dd>
																	<dd class="two" style="display: block;">
																		<a href="javascript:void(0);" class="star-select" title="2 Star">2</a>
																	</dd>
																	<dd class="three" style="display: block;">
																		<a href="javascript:void(0);" class="star-select" title="3 Star">3</a>
																	</dd>
																	<dd class="four" style="display: block;">
																		<a href="javascript:void(0);" class="star-select" title="4 Star">4</a>
																	</dd>
																	<dd class="five" style="display: block;">
																		<a href="javascript:void(0);" class="star-select" title="5 Star">5</a>
																	</dd>
																</dl>
															</div>
														</li>
														<li style="display: block;">
															<h4>Would you recommend this product?</h4>
															<div class="review-cont">
																<input type="radio" name="recommend" value="1" checked="checked"/>
																Yes,
																<input type="radio" name="recommend" value="0"/>
																No
															</div>
														</li>
														<li style="display: block;">
															<h4>Post your review:</h4>
															<div class="review-cont">
																<textarea name="review" id="" class="" rows="5"></textarea>
															</div>
														</li>
													</ul>
													<div class="buttons-set rgrp">
														<button type="button" class="button" id="post-my-review" onclick="return Review(this.form)">Post my review</button>
														<input type="hidden" name="action" value="add"/>
													</div>
												</form>
											</div>
<?php 
	$DB2 = new myDB;
	$reviewSQL = "SELECT * FROM RatingReview WHERE ProductID = ".$data["ProductID"];
	$reviewSQL .=" ORDER BY date_posted DESC";
	$DB2->query($reviewSQL);
	if($DB2->rows > 0){
?>											
											<div class="review_list">
												<ul class="user-review">
<?php 
		$line=1;
		while ($review = $DB2->fetch_array($DB2->res)){
?>											
													<li class="<?php if($line==1) echo "first";?>" style="display: block;">
														<div class="review">
															<div class="avatar">
<?php 
			$num = array("one","tow","three","four","five");
			for($i=1; $i<=5; $i++){
				if($i == $review["rating"]){
					$rating = $num[$i-1];
				}
			}
?>
																<ul class="rating <?php echo $rating;?>star"></ul>
																<p class="review-date"><?php echo $review["date_posted"];?></p>
																<p class="user"><?php echo $review["member_id"];?></p>
															</div>
															<div class="comment">
																<div class="recommend">
<?php 	
			if($review["recommend"]==1){
?>																
																	<span class="redstar">Yes,</span>
																	 I recommend this product.
	<?php 	}else{?>																 
																	<span class="red">No,</span>
																	 I don't recommend this product.
	<?php 	}?>
																</div>
																<div style="word-wrap: break-word; overflow: hidden;">
																	<?php echo $review["comment"];?>
																</div>
															</div>
														</div>
													</li>
<?php 
			$line++;
		}
?>
												</ul>
											</div>
<?php }?>											
										</div>
									</li>
									
									
								</ul>
							</div>
							
							


	
<?php
if ($data["Cat1ID"]==2) 
	$related_cata1="Cat1ID= 7";

else if ($data["Cat1ID"]==3)
	$related_cata1="Cat1ID= 5";
else if ($data["Cat1ID"]==4)
	$related_cata1="Cat1ID= 13 OR Cat1ID= 18";
else if ($data["Cat1ID"]==5)
	$related_cata1="Cat1ID= 3";
else if ($data["Cat1ID"]==7)
	$related_cata1="Cat1ID= 14 OR Cat1ID= 16";
else if ($data["Cat1ID"]==8)
	{		
		$related_cata1="Cat1ID= 8";
		
		if ($data["Cat2ID"]==51)
			$related_cata1.=" AND (Cat2ID= 52 OR Cat2ID= 53)" ;
		if ($data["Cat2ID"]==52)
			$related_cata1.=" AND (Cat2ID= 51 OR Cat2ID= 53)" ;
		if ($data["Cat2ID"]==53)
			$related_cata1.=" AND (Cat2ID= 51 OR Cat2ID= 52)" ;		
	}
else if ($data["Cat1ID"]==10)
	{		
		$related_cata1="Cat1ID= 15";
		
		if ($data["Cat2ID"]==54)
			$related_cata1.=" AND Cat2ID= 64" ;
		if ($data["Cat2ID"]==55)
			$related_cata1.=" AND Cat2ID= 63" ;			
	}
else if ($data["Cat1ID"]==11)
	$related_cata1="Cat1ID= 26";
else if ($data["Cat1ID"]==12)
	{		
		$related_cata1="Cat1ID= 12";
		
		if ($data["Cat2ID"]==57)
			$related_cata1.=" AND (Cat2ID= 58 OR Cat2ID= 59 OR Cat2ID= 60 OR Cat2ID= 61)" ;
		if ($data["Cat2ID"]==58)
			$related_cata1.=" AND (Cat2ID= 57 OR Cat2ID= 59 OR Cat2ID= 60 OR Cat2ID= 61)" ;
		if ($data["Cat2ID"]==59)
			$related_cata1.=" AND (Cat2ID= 57 OR Cat2ID= 58 OR Cat2ID= 60 OR Cat2ID= 61)" ;
		if ($data["Cat2ID"]==60)
			$related_cata1.=" AND (Cat2ID= 57 OR Cat2ID= 58 OR Cat2ID= 59 OR Cat2ID= 61)" ;
		if ($data["Cat2ID"]==61)
			$related_cata1.=" AND (Cat2ID= 57 OR Cat2ID= 58 OR Cat2ID= 59 OR Cat2ID= 60)" ;		
			
	}
else if ($data["Cat1ID"]==13)
	$related_cata1="Cat1ID= 4";	
else if ($data["Cat1ID"]==14)
	$related_cata1="(Cat1ID= 7 OR Cat1ID= 16)";	
else if ($data["Cat1ID"]==15)
	{		
		$related_cata1="Cat1ID= 10";
		
		if ($data["Cat2ID"]==64)
			$related_cata1.=" AND Cat2ID= 54" ;
		if ($data["Cat2ID"]==63)
			$related_cata1.=" AND Cat2ID= 55" ;
	}
else if ($data["Cat1ID"]==16)
	$related_cata1="(Cat1ID= 7 OR Cat1ID= 14)";	
else if ($data["Cat1ID"]==17)
{
	if (strpos($data["Cat1ID"],"Jersey"))
	$related_cata1="(Cat1ID= 17 AND ProductName LIKE '%Short%')";
	if (strpos($data["Cat1ID"],"Short"))
	$related_cata1="(Cat1ID= 17 AND ProductName LIKE '%Jersey%')";		
}
else if ($data["Cat1ID"]==18)
	$related_cata1="(Cat1ID= 4 OR Cat1ID= 13)";
else if ($data["Cat1ID"]==19)
	{
	if ($data["Cat2ID"]==68)
	$related_cata1="((Cat1ID = 15 AND (Cat2ID = 62 OR Cat2ID = 65)) OR (Cat1ID = 24 AND Cat2ID = 95))";	
	}
else if ($data["Cat1ID"]==26)
	$related_cata1="Cat1ID= 11";

		



$RstrSQL = "SELECT * FROM Products WHERE 1";
	
if 	($data["Player"]!="" || $data["Club"]!="" || $data["Country"]!="" )
{
	if 	(($data["Player"]!="" && $data["Club"]!="") || ($data["Player"]!="" && $data["Country"]!=""))
	{
		if ($data["Player"]!="" && $data["Club"]!="")
		$RstrSQL.=" AND (Player LIKE '%".$data["Player"]."%' OR ProductName LIKE '%".$data["Player"]."%')";
		if ($data["Player"]!="" && $data["Country"]!="")
		$RstrSQL.=" AND (Player LIKE '%".$data["Player"]."%' OR ProductName LIKE '%".$data["Player"]."%' OR Country LIKE '%".$data["Country"]."%' OR ProductName LIKE '%".$data["Country"]."%')";		
	}
	else
	{
		if ($data["Player"]!="")
		$RstrSQL.=" AND (Player LIKE '%" .$data["Player"]."%' OR ProductName LIKE '%" .$data["Player"]."%')";
		if ($data["Club"]!="")
		$RstrSQL.=" AND (Club LIKE '%" .$data["Club"]."%' OR ProductName LIKE '%" .$data["Club"]."%')";
		if ($data["Country"]!="")
		$RstrSQL.=" AND (Country LIKE '%" .$data["Country"]."%' OR ProductName LIKE '%" .$data["Country"]."%')";
		
	}
}
else
{
	if(!empty($related_cata1))
	$RstrSQL.="AND ".$related_cata1;
	
}

	
	$RstrSQL.=" AND IsActive=\"Y\" ORDER BY DateTimeLastModified DESC, ProductID DESC, ProductName ASC LIMIT 0 , 30 ";
	
//$RstrSQL = "SELECT * FROM Products WHERE Cat1ID=".$data["Cat1ID"]." AND Cat2ID=".$data["Cat2ID"]." AND IsActive=\"Y\" LIMIT 0 , 20 ";	
$DB->query($RstrSQL);


if ($DB->rows>0)
{
?>
					<div id="related-items1" class="container">
						<h2>Related Items</h2>	
	     				
					   <div id="amazon_scroller3" class="amazon_scroller">
							<div class="amazon_scroller_mask" >
								<ul>
							   
							   <!--=============================================================================================================================-->
							   <!--=============================================================================================================================-->
							   <!--=============================================================================================================================-->
							   
							   
								<?php
									while ($Rdata = $DB->fetch_array($DB->res)){
								   
									  echo" <li><a href=\"/?pid=".$Rdata["ProductID"]."\" title=\"".$Rdata["ProductName"]." \" target=\"\"><img src=\"/Images_Products/".$Rdata["Picture1"]."\" width=\"124\" height=\"160\" alt=\"\"/></a></li>";
								   
									}
								?>
								
								
							   <!--=============================================================================================================================-->
							   <!--=============================================================================================================================-->
							   <!--=============================================================================================================================-->
							   
							   </ul>
							</div>
							<ul class="amazon_scroller_nav">
								<li></li>
								<li></li>
							</ul>
							<div style="clear: both"></div>
						</div>
                    </div>
		<?php
			}
		?>
					
				
							
							
<!-- End Note to buyer -->						
<script type="text/javascript">
	
	function fill(color) {
		//alert(document.getElementById('bluk_'+color).value);
		//alert(document.getElementById('bulk_'+color).value); 
		
		//document.getElementById('fill_'+color).value=color+';'+document.getElementById('bulk_'+color).value;
		//alert(color);
		var qty=$('#bulk_'+color).val();
		var unitprice=$('#unitprice').val();
		var PrepackQuantity=$('#PrepackQuantity').val();
		var price=qty*unitprice*PrepackQuantity;
		$('#price_'+color).val(price);
		$('#fill_'+color).val(color+';'+$('#bulk_'+color).val());

		var frmData1	= $('form').serializeArray();
			//alert($('#tsize').text());
			//if (flag) return false;
			//$("#ajax_loader").css("display","block");
			frmData1.push({name:"mode", value:"sum"});
			
			$.ajax({
				async:false, type:"POST", dataType:"json", url:"/lib/ajaxtools.php",
				data:frmData1,
					success:function(d){
					$('#total_qty').val(d.sum[0].qty);
					var t_price=d.sum[0].qty*d.sum[0].price*PrepackQuantity;
					$('#total_price').val(t_price);
					}
			});

	}


	jQuery(function(jQuery) {
		var jqTr_zindex = 11;
		$(".jqTransformSelect").jqTransform();

		$("div.jqTransformSelectWrapper, a.jqTransformSelectOpen").click(function() {
			$(this).css("z-index",jqTr_zindex);
			jqTr_zindex++;
		});
		
		$("button[title='Add to Cart']").click(function() {
			var emblem	= ($('#attachemblem').is(':checked')) ? "1" : "0";
			var flag 	= false;
			var pflag	= ($('#personalizeit:checked').val()=="Y")? "Y":"N";
			/*
			if($('#size').val()=="-- Please Select --") {
				$('#advice-required-entry-select_1').fadeIn(1000);
				flag = true;
			}else{
				$('#advice-required-entry-select_1').css('display','none');
			}
			if($('#color').val()=="-- Please Select --") {
				$('#advice-required-entry-select_2').fadeIn(1000);
				flag = true;
			}else{
				$('#advice-required-entry-select_2').css('display','none');
			}*/
			
			var frmData1	= $('form').serializeArray();
			//alert($('#tsize').text());
			//if (flag) return false;
			$("#ajax_loader").css("display","block");
			frmData1.push({name:"action", value:"add"},{name:"id", value:$('input[name="productid"]').val()},{name:"p_flag", value:"C"},{name:"PrepackQuantity", value:$('#PrepackQuantity').val()});
			frmData1.push({name:"options[color]", value:$('#bulk_color_3').val()});
			
			$.ajax({
				async:false, type:"POST", dataType:"json", url:"/lib/cart_action.php",
				data:frmData1,
					success:function(d){
					$("#ajax_loader").css("display","none");
					$("div.alert").slideDown(1000, function() {
						$(this).delay(6000).slideUp(1000);
					});
					$("#mycart").html("My Cart ("+d.cartItems[0].cartItemCount+" items)");
					updateMiniCart();
				}
			});
			
			
		});
		
		$("#bulktocart").click(function() {
			//$("#ajax_loader").css("display","block");
			var pno = 0;
			var q 	= $("input[name='qty']").val();
			var frmData	= $('#frmPrint').serializeArray();
			frmData.push({name:"action", value:"add"},{name:"id", value:$('input[name="productid"]').val()},{name:"p_flag", value:"B"},{name:"qty", value:$('#quantity_wanted').val()});
			frmData.push({name:"options[size]", value:$('#bulk_size_1').val()},{name:"options[color]", value:$('#bulk_color_1').val()});
			$.ajax({
				async:true, type:"post", dataType:"html", url:"/lib/cart_action.php",
				data: frmData,
				success: function(d) {
					$("div.alert").slideDown(1000, function() {
						$(this).delay(6000).slideUp(1000);
					});
					$("#mycart").html("My Cart ("+d.cartItems[0].cartItemCount+" items)");
					updateMiniCart();
				}
			});



/*
			for(i=1; i<=q; i++){
				pno++;
	//			if($("#bulk_BigNo_"+i).val()=="")
	//				pno=$("#bulk_smallNo_"+i).val();
	//			else
	//				pno=$("#bulk_BigNo_"+i).val();
				$.ajax({
					async:false, type:"POST", dataType:"json", url:"/lib/cart_action.php",
					data:{
						"qty":"1",
						"id":$("input[name='productid']").val(),
						"options":{"size":$("#bulk_size_"+i).val(),"color":$("#bulk_color_"+i).val(),"p_flag":"B","p_name":$("#bulk_name_"+i).val(),"p_number":pno,"p_bnumber":$("#bulk_BigNo_"+i).val(),"p_snumber":$("#bulk_smallNo_"+i).val()},
						"action":"add"
					},success:function(d){
						$("div.alert").slideDown(1000, function() {
							$(this).delay(6000).slideUp(1000);
						});
						$("#mycart").html("My Cart ("+d.cartItems[0].cartItemCount+" items)");
						updateMiniCart();
					}
				});
			}
*/
			
		});
		
		$('#print_form').click(function() {
			var url = "contents/print_bulk_order.php";
			$('#frmPrint').attr("action", url);
			$('#frmPrint').submit();
		});
		
		$(".inner_alert > button").click(function() {
			$("div.alert").clearQueue();
			$("div.alert").slideUp(1000);
		});
		$("#personalizeit").click(function() {
			if ($("#personalizeit").is(":checked")) {
				$("#personalarea, .price-options").show();
				$("#our_price_display").html($("#alt-price").html());
			} else {
				$("#personalarea, .price-options").hide();
				$("#our_price_display").html($("#sale-price").html());
			}
		});		
		
	});




	
</script>					
						




<script type="text/javascript">
 
    
        $(document).ready(function(){
        
            var $the_width = $('.container').width();
            
            $('#amazon_scroller3').css('width', $the_width);
            $('#amazon_scroller3').css('height', '230px');
            
            $('.amazon_scroller_mask').css('width', $the_width-90);
            $('.amazon_scroller_mask').css('height', '202px');
            
            $('.amazon_scroller_nav').css('width', $the_width-25);
            $('.amazon_scroller_nav').css('top', '72.5px');
            $('#amazingslider-1').css( 'width', 'auto');
            
            var $image_width = $('#amazingslider-wrapper-1').width();
                $('.amazingslider-img-1 img').css('width', $image_width);
                $('#amazingslider-1').css('width', $image_width);
             
            $(window).resize(function(){
                
                var $the_width = $('.container').width();
            
                $('#amazon_scroller3').css('width', $the_width);
                $('#amazon_scroller3').css('height', '230px');
                
                $('.amazon_scroller_mask').css('width', $the_width-90);
                $('.amazon_scroller_mask').css('height', '202px');
                
                $('.amazon_scroller_nav').css('width', $the_width-25);
                $('.amazon_scroller_nav').css('top', '72.5px');
                
                $('#amazingslider-1').css( 'width', 'auto');
                
                var $image_width = $('#amazingslider-wrapper-1').width();
                $('.amazingslider-img-1 img').css('width', $image_width);
                $('#amazingslider-1').css('width', $image_width);
            });
            
        });


</script>

<script src="/js/qslider.js"></script>