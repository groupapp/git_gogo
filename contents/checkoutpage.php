<?php 
	if (empty($_SESSION['cart'])) {
		echo "<script>location.replace('".SITE_URL."/?page=mycart')</script>";
		exit;
	}
	
	if (!empty($_COOKIE['userID'])) {
		$nStep = 0;		
		$display = "style=\"display:none\"";

		

	} else {
		$nStep = 1;
		$display = "";
	}

	$strSQLc="SELECT * FROM Customers WHERE LoginID='".$_COOKIE['userID']."'";
	//echo $strSQLc;
	//exit;
				$DBc = new myDB;
				$DBc->query($strSQLc);
				$cus = $DBc->fetch_array($DBc->res);
				$ml=$cus["Member_level"];
				$memberlebel=$ml;
		echo '<input type="hidden" id="ml" name="ml" value="'.$ml.'">';

	if (!empty($_POST['promo_code'])) {
		$arrPromo = getPromoInfo($_POST['promo_code'],$_POST['cart_total']);
		$isFS = "SELECT IsFreeShip FROM Coupons WHERE coupon_code = '".$_POST['promo_code']."'";
		$freeShipDB = new myDB;
		$freeShipDB->query($isFS);
		$freeShip = $freeShipDB->fetch_array($freeShipDB->res);
		if($freeShip["IsFreeShip"]=='y'){
			$isFreeShip = "freeShip";
		}
		if ($arrPromo['response']==1 && $arrPromo['type']=="free_shipping"){
			$coupon_type = "freeshipping";
		}elseif($arrPromo['response']==1 && $arrPromo['type']=="total_discount"){
			$coupon_type = "total_discount";
		}elseif($arrPromo['response']==1 && $arrPromo['type']=="free_product"){
			$coupon_type = "free_product";
		}elseif($arrPromo['response']==1 && $arrPromo['type']=="combo_discount"){
			$coupon_type = "combo_discount";
		}
	}
//	echo "Promo Code: ".$_POST['promo_code']."<br/>";
//	echo "Coupon Type: ".$coupon_type."<br/>";
//	echo "isFreeShip: ".$isFreeShip."<br/>";
?>


                                    <div class="container" style="margin-top: 40px;">
                                        <!--div class="right-col1 col-md-3">
						<div>
							<div id="checkout-progress-wrapper">
								<div class="block block-progress opc-block-progress">
								    <div class="block-title">
								        <strong><span>Your Checkout Progress</span></strong>
								    </div>
								    <div class="block-content">
								        <dl>
								        	<dt id="b-address"><span class="checkout-info">Billing Address</span><div class="block-option hidden"><span class="separator"> | </span><a href="#billing" onclick="checkout_step('billing'); return false;">Change</a></div></dt>
								        	<dt id="s-address"><span class="checkout-info">Shipping Address</span><div class="block-option hidden"><span class="separator"> | </span><a href="#billing" onclick="checkout_step('shipping'); return false;">Change</a></div></dt>
								        	<dt id="s-method"><span class="checkout-info">Shipping Method</span><div class="block-option hidden"><span class="separator"> | </span><a href="#billing" onclick="checkout_step('shipping_method'); return false;">Change</a></div></dt>
								        	<dt id="p-method">Payment Method</dt>
								        </dl>
								    </div>
								</div>
							</div>
						</div>
					</div-->
                                            <div class="right-col1 col-md-3">

                                                <div class="list-group">
												<dl>	       
                                                    <dt id="b-address">
                                                    <span href="/?page=customer&account=myaccount" class="list-group-item default">
                                                        <span class="checkout-info">Billing Address</span><a href="#billing" onclick="checkout_step('billing'); return false;"><span style="float:right;">Change</span></a>           
                                                    </span></dt>

													<dt id="s-address">		
                                                    <span href="/?page=customer&account=mypersonalinfo" class="list-group-item default">
                                                        <span class="checkout-info">Shipping Address</span><a href="#billing" onclick="checkout_step('shipping'); return false;"><span style="float:right;">Change</span></a>
                                                    </span></dt>
                                                    
													<dt id="s-method">
                                                    <span href="/?page=customer&account=mypersonalinfo" class="list-group-item default">
                                                        <span class="checkout-info">Shipping Method</span><a href="#billing" onclick="checkout_step('shipping_method'); return false;"><span style="float:right;">Change</span></a>
                                                    </span></dt>
                                                    
													<dt id="p-method">
                                                    <span href="/?page=customer&account=mypersonalinfo" class="list-group-item default">
                                                        <span class="checkout-info">Payment Method</span>
                                                    </span></dt>
													</dl>			
                                                </div>

                                            </div>
                                            
                                            

					<div class="main-col1 col-md-9">
						<div class="page-title">
							<h1><span>Checkout</span></h1>
							<?php echo isset($_POST["$prod_img"]) ?>
						</div>
						<div class="alert" style="display:none">
							<div class="inner_alert"><button></button></div>
						</div>
						<ol class="opc" id="checkoutSteps">
						
						    <li id="opc-login" class="section active" <?php echo $display?>>
						        <div class="step-title">
						            <span class="number"><?php echo $nStep?></span>
						            <h2>Checkout Method</h2>
						            <a href="#">Edit</a>
						        </div>

						        <div id="checkout-step-login" class="step a-item" style="display:block;">
						            <div class="col2-set">
						        		<div class="col-1">
						        			<!--<h3>Checkout as a Guest or Register</h3>
						            		<p>Register with us for future convenience:</p>
						            		<ul class="form-list">
								            	<li class="control">
								                    <input type="radio" name="checkout_method" id="login:guest" value="guest" class="radio" /><label for="login:guest">Checkout as Guest</label>
								                </li>
								                <li class="control">
								                    <input type="radio" name="checkout_method" id="login:register" value="register" class="radio" /><label for="login:register">Register</label>
								                </li>
								            </ul>
								            <h4>Register and save time!</h4>
								            <p>Register with us for future convenience:</p>
								            <ul class="ul">
								                <li>Fast and easy check out</li>
								                <li>Easy access to your order history and status</li>
								            </ul>-->
						            		<div class="col-1">
						        				<div class="buttons-set">
						            				<input type="hidden" name="checkout_method" id="loginregister" value="register"  />
													<p class="required">&nbsp;</p>
						                            <button id="onepage-guest-register-button" type="button" class="button" onclick="checkout_method();"><span><span>New Member</span></span></button>
						                    	</div>
						    				</div>
						    			</div>

						    			<div class="col-2">
						        			<h3>Login</h3>
						                	<form id="login-form" action="/contents/member_action.php" method="post">
						                	<input type="hidden" name="login[returnurl]" value="/?page=checkout" />
						                	<input type="hidden" name="login[action]" value="login" />
						                	<input type="hidden" name="frmdata[promo_code]" value="<?php echo $_POST['promo_code']?>" />
						                	<input type="hidden" name="frmdata[cart_total]" value="<?php echo $_POST['cart_total']?>" />
						        			<fieldset>
									            <!--<h4>Already registered?</h4>
									            <p>Please log in below:</p>-->
									            <ul class="form-list">
									                <li>
									                    <label for="login-email" class="required"><em>*</em>Email Address</label>
									                    <div class="input-box">
									                        <input type="text" class="input-text required-entry validate-email" id="login-email" name="login[userid]" value="" />
									                    </div>
									                </li>
									                <li>
									                    <label for="login-password" class="required"><em>*</em>Password</label>
									                    <div class="input-box">
									                        <input type="password" class="input-text required-entry" id="login-password" name="login[password]" />
									                    </div>
									                </li>
									                                            </ul>
									            <input name="context" type="hidden" value="checkout" />
									        </fieldset>
									        </form>
						    			</div>
								        <div class="col-2">
									        <div class="buttons-set">
									            <!--<p class="required">* Required Fields</p>-->
									            <a href="/customer/account/forgotpassword/" class="f-left">Forgot your password?</a>
									            <button type="submit" class="button" onclick="onepageLogin()" style="margin-top:120px;margin-right:-120px;"><span><span>Login</span></span></button>
									        </div>
									    </div>
									</div>

						        </div>
						    </li>

						    <li id="opc-billing" class="section">
						        <div class="step-title">
						            <span class="number"><?php echo ($nStep+1)?></span>
						            <h2>Billing Information</h2>
						            <a href="#">Edit</a>
						        </div>
						        <div id="checkout-step-billing" class="step a-item" style="display:none;">
						        	<p>We accept major credit cards. Just be sure that the BILLING ADDRESS you enter is the same address where you receive your credit card statement.</p>
						            <p>Please be sure to add our emails to your safe list to prevent them from being caught by SPAM filters.</p>
						            <form id="co-billing-form" action="" method="post">
									<fieldset>
									    <ul class="form-list">
									        <li id="billing-new-address-form">
									        <fieldset>
									            <input type="hidden" title="hideme" name="billing[uid]" id="billing:uid" />
									            <input type="hidden" title="hideme" name="billing[checkoutas]" id="billing:checkoutas" />
									            <input type="hidden" title="hideme" id="billing:address_status" />
									            <ul>
									                <li class="fields">
									                	<div class="customer-name">
									    					<div class="field name-firstname">
									        					<label for="billing:firstname" class="required"><em>*</em>First Name</label>
									        					<div class="input-box">
									            					<input type="text" id="billing:firstname" name="billing[firstname]" value="" title="First Name" maxlength="255" class="input-text required-entry"  />
									        					</div>
									    					</div>
														    <div class="field name-lastname">
														        <label for="billing:lastname" class="required"><em>*</em>Last Name</label>
														        <div class="input-box">
														            <input type="text" id="billing:lastname" name="billing[lastname]" value="" title="Last Name" maxlength="255" class="input-text required-entry"  />
														        </div>
														    </div>
														</div>
													</li>
									                <li class="fields">
									                    <div class="field">
									                        <label for="billing:company">Company</label>
									                        <div class="input-box">
									                            <input type="text" id="billing:company" name="billing[company]" value="" title="Company" class="input-text " />
									                        </div>
									                    </div>
														<div class="field-2">
									                        <label for="billing:email" class="required"><em>*</em>Email Address</label>									                        
									                        <div class="input-box">								                        	
									                            <input type="text" name="billing[email]" id="billing:email" value="" title="Email Address" class="input-text validate-email required-entry" />
									                        </div>
									                    </div>
													</li>
													<li class="wide">
									                    <label for="billing:street1" class="required"><em>*</em>Address</label>
									                    <div class="input-box">
									                        <input type="text" title="Street Address" name="billing[street][]" id="billing:street1" value="" class="input-text  required-entry" />
									                    </div>
									                </li>
						                            <li class="wide">
									                    <div class="input-box">
									                        <input type="text" title="Street Address 2" name="billing[street][]" id="billing:street2" value="" class="input-text " />
									                    </div>
									                </li>
									                <li class="fields">
									                    <div class="field">
									                        <label for="billing:city" class="required"><em>*</em>City</label>
									                        <div class="input-box">
									                            <input type="text" title="City" name="billing[city]" value="" class="input-text  required-entry" id="billing:city" />
									                        </div>
									                    </div>
									                    <div class="field-2">
									                        <label for="billing:region_id" class="required"><em>*</em>State/Province</label>
									                        <div class="input-box">
									                            <select id="billing:region_id" name="billing[region_id]" title="State/Province" class="required-entry" style="">
									                                <option value="">Please select region, state or province</option>
									                                <script type="text/javascript">$(document).ready(function() {showStates2("#billing\\:region", "#billing\\:region_id", "US", "");});</script>
									                            </select>

									                            <input type="text" id="billing:region" name="billing[region]" value=""  title="State/Province" class="input-text required-entry" style="display:none;" />
									                        </div>
									                    </div>
									                </li>
						                			<li class="fields">
									                    <div class="field">
									                        <label for="billing:postcode" class="required"><em>*</em>Zip/Postal Code</label>
									                        <div class="input-box">
									                            <input type="text" title="Zip/Postal Code" name="billing[postcode]" id="billing:postcode" value="" class="input-text validate-zip-international  required-entry" />
									                        </div>
									                    </div>
									                    <div class="field-2">
									                        <label for="billing:country_id" class="required"><em>*</em>Country</label>
									                        <div class="input-box">
									                            <select name="billing[country_id]" id="billing:country_id" class="validate-select" title="Country" >
<?php
	include dirname(__FILE__) . "/../lib/CountryCodes.php";
	foreach($country_list as $code => $name) {
		echo "<option value=\"$code\">$name</option>\n";
	}
?>
									                            </select>
									                        </div>
									                    </div>
									                </li>
									                <li class="fields">
									                    <div class="field">
									                        <label for="billing:telephone" class="required"><em>*</em>Telephone</label>
									                        <div class="input-box">
									                            <input type="text" name="billing[telephone]" value="" title="Telephone" class="input-text  required-entry" id="billing:telephone" />
									                        </div>
									                    </div>
									                    <div class="field-2">
									                        <label for="billing:fax">Fax</label>
									                        <div class="input-box">
									                            <input type="text" name="billing[fax]" value="" title="Fax" class="input-text " id="billing:fax" />
									                        </div>
									                    </div>
									                </li>
									                <li class="fields" id="register-customer-password">
									                    <div class="field">
									                        <label for="billing:customer_password" class="required"><em>*</em>Password</label>
									                        <div class="input-box">
									                            <input type="password" name="billing[customer_password]" id="billing:customer_password" title="Password" class="input-text required-entry validate-password" />
									                        </div>
									                    </div>
									                    <div class="field-2">
									                        <label for="billing:confirm_password" class="required"><em>*</em>Confirm Password</label>
									                        <div class="input-box">
									                            <input type="password" name="billing[confirm_password]" title="Confirm Password" id="billing:confirm_password" class="input-text required-entry validate-cpassword" />
									                        </div>
									                    </div>
									                </li>
						                            <li class="no-display">
						                            	<input type="hidden" name="billing[save_in_address_book]" value="1" />
						                            </li>
						                            <script type="text/javascript">
							                            $('select[id$="country_id"]').live("change", function() {
								                            var temp = $(this).attr("id").split(":");
								                            var txtID = temp[0];
															var ccode = $(this).val();
															if(ccode=="US" || ccode=="CA" || ccode=="MX") {
																$('#'+txtID+'\\:region').css("display","none").val('');
																$('#'+txtID+'\\:region_id').css("display","block");
																$('#'+txtID+'\\:region_id').html('');
																$.ajax({
																	async:false, type:"post", dataType:"json", url:"/lib/states.php",
																	data:{"code":ccode},
																	success:function(d) {
																		if (d) {
																			for(var i=0; i<d.states.length; i++) {
																				$('#'+txtID+'\\:region_id').append(new Option(d.states[i].sname,d.states[i].scode,false,false));
																			}
																		}
																	}
																});
															} else {
																$('#'+txtID+'\\:region').css("display","block");
																//$('#'+txtID+'\\:region').val('');
																$('#'+txtID+'\\:region_id').css("display","none").html('');
															}
														});
						                            </script>
						                        </ul>
						                        <div id="window-overlay" class="window-overlay" style="display:none;"></div>
												<div id="remember-me-popup" class="remember-me-popup" style="display:none;">
												    <div class="remember-me-popup-head">
												        <h3>What's this?</h3>
												        <a href="#" class="remember-me-popup-close" title="Close">Close</a>
												    </div>
												    <div class="remember-me-popup-body">
												        <p>Checking &quot;Remember Me&quot; will let you access your shopping cart on this computer when you are logged out</p>
												        <div class="remember-me-popup-close-button a-right">
												            <a href="#" class="remember-me-popup-close button" title="Close"><span>Close</span></a>
												        </div>
												    </div>
												</div>
											</fieldset>
											</li>
						            		<li class="control">
									            <input type="radio" name="billing[use_for_shipping]" id="billing:use_for_shipping_yes" value="1" checked="checked" title="Ship to this address" onclick="$('shipping\\:same_as_billing').checked = true;" class="radio" /><label for="billing:use_for_shipping_yes">Ship to this address</label></li>
									        <li class="control">
									            <input type="radio" name="billing[use_for_shipping]" id="billing:use_for_shipping_no" value="0" title="Ship to different address" onclick="$('shipping\\:same_as_billing').checked = false;" class="radio" /><label for="billing:use_for_shipping_no">Ship to different address</label>
									        </li>
						        		</ul>
								        <div class="buttons-set" id="billing-buttons-container">
									        <p class="required">* Required Fields</p>
									        <button type="button" title="Continue" class="button" onclick="billing_save()"><span><span>Continue</span></span></button>
									        <span class="please-wait" id="billing-please-wait" style="display:none;">
									            <img src="/images/ajax_loader.gif" alt="Loading next step..." title="Loading next step..." class="v-middle" /> Loading next step...        
									        </span>
									    </div>
									</fieldset>
									</form>
						        </div>
						    </li>
						    <li id="opc-shipping" class="section">
						        <div class="step-title">
						            <span class="number"><?php echo ($nStep+2)?></span>
						            <h2>Shipping Information</h2>
						            <a href="#">Edit</a>
						        </div>
						        <div id="checkout-step-shipping" class="step a-item" style="display:none;">
						        <p>Please enter your shipping address information below. The address you enter is where we will delivery your package.</p>
						        <form action="" id="co-shipping-form" method="post">
						        	<input type="hidden" name="shipping[lb_weight]" id="shipping:lb_weight" />
						        	<input type="hidden" name="shipping[coupon_opt]" id="shipping:coupon_opt" value="<?php echo $coupon_type?>" />
						        	<input type="hidden" name="shipping[isfreeShip]" id="shipping:isfreeShip" value="<?php echo $isFreeShip?>">
									<input type="hidden" name="memberlebel" id="memberlebel" value="<?php echo $memberlebel?>">
						    		<ul class="form-list">
						            	<li id="shipping-new-address-form">
						            	<fieldset>
						                	<input type="hidden" name="shipping[address_id]" value="" id="shipping:address_id" />
						                	<ul>
						                    	<li class="fields">
						                    		<div class="customer-name">
						    							<div class="field name-firstname">
						        							<label for="shipping:firstname" class="required"><em>*</em>First Name</label>
						        							<div class="input-box">
						            							<input type="text" id="shipping:firstname" name="shipping[firstname]" value="" title="First Name" maxlength="255" class="input-text required-entry" />
						        							</div>
						    							</div>
													    <div class="field name-lastname">
													        <label for="shipping:lastname" class="required"><em>*</em>Last Name</label>
													        <div class="input-box">
													            <input type="text" id="shipping:lastname" name="shipping[lastname]" value="" title="Last Name" maxlength="255" class="input-text required-entry" />
													        </div>
													    </div>
													</div>
												</li>
							                    <li class="fields">
							                        <div class="fields">
							                            <label for="shipping:company">Company</label>
							                            <div class="input-box">
							                                <input type="text" id="shipping:company" name="shipping[company]" value="" title="Company" class="input-text " onchange="shipping.setSameAsBilling(false);" />
							                            </div>
							                        </div>
							                    </li>
						                        <li class="wide">
							                        <label for="shipping:street1" class="required"><em>*</em>Address</label>
							                        <div class="input-box">
							                            <input type="text" title="Street Address" name="shipping[street][]" id="shipping:street1" value="" class="input-text  required-entry" />
							                        </div>
							                    </li>
						                        <li class="wide">
							                        <div class="input-box">
							                            <input type="text" title="Street Address 2" name="shipping[street][]" id="shipping:street2" value="" class="input-text " />
							                        </div>
							                    </li>
						                        <li class="fields">
							                        <div class="field">
							                            <label for="shipping:city" class="required"><em>*</em>City</label>
							                            <div class="input-box">
							                                <input type="text" title="City" name="shipping[city]" value="" class="input-text  required-entry" id="shipping:city" />
							                            </div>
							                        </div>
							                        <div class="field-2">
							                            <label for="shipping:region" class="required"><em>*</em>State/Province</label>
							                            <div class="input-box">
							                                <select id="shipping:region_id" name="shipping[region_id]" title="State/Province" class="required-entry">
							                                    <option value="">Please select region, state or province</option>
							                                    <script type="text/javascript">$(document).ready(function() {showStates2("#shipping\\:region", "#shipping\\:region_id", "US", "");});</script>
							                                </select>
							                                <input type="text" id="shipping:region" name="shipping[region]" value="" title="State/Province" class="input-text required-entry" style="display: none;" />
							                            </div>
							                        </div>
							                    </li>
							                    <li class="fields">
							                        <div class="field">
							                            <label for="shipping:postcode" class="required"><em>*</em>Zip/Postal Code</label>
							                            <div class="input-box">
							                                <input type="text" title="Zip/Postal Code" name="shipping[postcode]" id="shipping:postcode" value="" class="input-text validate-zip-international  required-entry" />
							                            </div>
							                        </div>
							                        <div class="field-2">
							                            <label for="shipping:country_id" class="required"><em>*</em>Country</label>
							                            <div class="input-box">
							                                <select name="shipping[country_id]" id="shipping:country_id" class="validate-select" title="Country">
<?php
	foreach($country_list as $code => $name) {
		echo "<option value=\"$code\">$name</option>\n";
	}
?>							                                
							                                </select>
							                            </div>
							                        </div>
							                    </li>
							                    <li class="fields">
							                        <div class="field">
							                            <label for="shipping:telephone" class="required"><em>*</em>Telephone</label>
							                            <div class="input-box">
							                                <input type="text" name="shipping[telephone]" value="" title="Telephone" class="input-text  required-entry" id="shipping:telephone" />
							                            </div>
							                        </div>
							                        <div class="field-2">
							                            <label for="shipping:fax">Fax</label>
							                            <div class="input-box">
							                                <input type="text" name="shipping[fax]" value="" title="Fax" class="input-text " id="shipping:fax" />
							                            </div>
							                        </div>
							                    </li>
						                        <li class="no-display"><input type="hidden" name="shipping[save_in_address_book]" value="1" /></li>
						                    </ul>
						            	</fieldset>
						        		</li>
						        		<li class="control">
								            <input type="checkbox" name="shipping[same_as_billing]" id="shipping:same_as_billing" value="1" title="Use Billing Address" class="checkbox" onclick="copyBilling();" /><label for="shipping:same_as_billing">Use Billing Address</label>
								        </li>
						    		</ul>
								    <div class="buttons-set" id="shipping-buttons-container">
								        <p class="required">* Required Fields</p>
								        <button type="button" class="button" title="Continue" onclick="shipping_save()"><span><span>Continue</span></span></button>
								        <span id="shipping-please-wait" class="please-wait" style="display:none;">
								            <img src="/images/ajax_loader.gif" alt="Loading next step..." title="Loading next step..." class="v-middle" /> Loading next step...
								        </span>
								    </div>
								</form>
								</div>
								
							</li>
						    <li id="opc-shipping_method" class="section">
						        <div class="step-title">
						            <span class="number"><?php echo ($nStep+3)?></span>
						            <h2>Shipping Method</h2>
						            <a href="#">Edit</a>
						        </div>
						        <div id="checkout-step-shipping_method" class="step a-item" style="display:none;">
						            <p>Shipping prices, methods, policies, times and avaliability are not guaranteed and are subject to change at any time without notice.</p>
						            <form id="co-shipping-method-form" action="">
						            	<input type="hidden" name="shippingMethod[choice]" id="shippingMethod:choice" />
							            <span class="please-wait" id="shipping-options-wait" style="display:none;">
										    <img src="/images/ajax_loader.gif" alt="Loading shipping options..." title="Loading shipping options..." class="v-middle" /> Loading shipping options...        
										</span>
							    		<div id="checkout-shipping-method-load">
											<div id="shipping_quote"></div>
							    		</div>
							    		<div id="onepage-checkout-shipping-method-additional-load"></div>
									    <div class="buttons-set" id="shipping-method-buttons-container">
									    	<p class="required">* Required Fields</p>
									        <button type="button" class="button" onclick="shippingMethod_save()"><span><span>Continue</span></span></button>
									        <span id="shipping-method-please-wait" class="please-wait" style="display:none;">
									            <img src="/images/ajax_loader.gif" alt="Loading next step..." title="Loading next step..." class="v-middle" /> Loading next step...</span>
									    </div>
									</form>
						        </div>
						    </li>
						    <li id="opc-payment" class="section">
						        <div class="step-title">
						            <span class="number"><?php echo ($nStep+4)?></span>
						            <h2>Payment Information</h2>
						            <a href="#">Edit</a>

									<!--<input type="text" id="ml1" name="ml1" value="<?php echo $ml?>">-->

						        </div>
						        <div id="checkout-step-payment" class="step a-item" style="display:none;">									
									<form action="" id="co-payment-form">
										<input type="hidden" id="payment_info"/>
										<input type="hidden" id="payment_az_status" name="payment[az-status]"/>

										<input type="hidden" id="payment_di_status" name="payment[di-status]"/>

									    <fieldset>
									        <dl class="sp-methods" id="checkout-payment-method-load">
									        	<dt>
										            <input id="p_method_ccsave" value="CC" type="radio" name="payment[method]"  title="Credit Card" class="radio" />
										            <label for="p_method_ccsave">Credit Card </label>
									    		</dt>
									    		<dd>
									        		<ul class="form-list" id="payment_form_ccsave" style="display:none;">
									    				<li>
													        <label for="ccsave_cc_fname" class="required"><em>*</em>Firstname on Card</label>
													        <div class="input-box">
													            <input type="text" title="First name on Card" class="input-text required-entry" id="ccsave_cc_fname" name="payment[cc_fname]" value="" />
													        </div>
													    </li>
													    <li>
													        <label for="ccsave_cc_lname" class="required"><em>*</em>Lastname on Card</label>
													        <div class="input-box">
													        	<input type="text" title="Last name on Card" class="input-text required-entry" id="ccsave_cc_lname" name="payment[cc_lname]" value="" />
													        </div>
													    </li>
									    				<li>
													        <label for="ccsave_cc_type" class="required"><em>*</em>Credit Card Type</label>
													        <div class="input-box">
													            <select id="ccsave_cc_type" name="payment[cc_type]" title="Credit Card Type" class="required-entry validate-cc-type-select">
													                <option value="">--Please Select--</option>
													                <option value="American Express">American Express</option>
													                <option value="Visa">Visa</option>
													                <option value="MasterCard">MasterCard</option>
													                <option value="Discover">Discover</option>
													            </select>
													        </div>
													    </li>
													    <li>
													        <label for="ccsave_cc_number" class="required"><em>*</em>Credit Card Number</label>
													        <div class="input-box">
													            <input type="text" id="ccsave_cc_number" name="payment[cc_number]" title="Credit Card Number" class="required-entry input-text validate-cc-number validate-cc-type" value="" />
													        </div>
													    </li>
													    <li>
													        <label for="ccsave_expiration" class="required"><em>*</em>Expiration Date</label>
													        <div class="input-box">
													            <div class="v-fix">
													                <select id="ccsave_expiration" name="payment[cc_exp_month]" class="month validate-cc-exp required-entry">
									                                                    <option value="">Month</option>
									                                    <option value="01">01 - January</option>
									                                    <option value="02">02 - February</option>
									                                    <option value="03">03 - March</option>
									                                    <option value="04">04 - April</option>
									                                    <option value="05">05 - May</option>
									                                    <option value="06">06 - June</option>
									                                    <option value="07">07 - July</option>
									                                    <option value="08">08 - August</option>
									                                    <option value="09">09 - September</option>
									                                    <option value="10">10 - October</option>
									                                    <option value="11">11 - November</option>
									                                    <option value="12">12 - December</option>
									                                </select>
													            </div>
													            <div class="v-fix">
									                                <select id="ccsave_expiration_yr" name="payment[cc_exp_year]" class="year required-entry">
									                                    <option value="">Year</option>
<?php 
	$current_year = date("Y");
	for ($i=0; $i<11; $i++) {
		echo "<option value=\"".($current_year+$i)."\">".($current_year+$i)."</option>\n";
	}
?>
									                                </select>
													            </div>
													        </div>
													    </li>
							            				<li>
													        <label for="ccsave_cc_cid" class="required"><em>*</em>Card Verification Number</label>
													        <div class="input-box">
													            <div class="v-fix">
													                <input type="text" title="Card Verification Number" class="input-text cvv required-entry validate-cc-cvn" id="ccsave_cc_cid" name="payment[cc_cid]" value="" />
													            </div>
													            <a href="javascript:void(0);" class="cvv-what-is-this">What is this?</a>
													        </div>
													    </li>
							        				</ul>
							    				</dd>
									    		<dt>
										            <input id="p_method_amazon" value="AZ" type="radio" name="payment[method]" title="Paypal Checkout" class="radio" />
										            <label for="p_method_amazon">PayPal </label>
										    	</dt>
									        	<dd> &nbsp; </dd>
												<dt>
										            <input id="p_method_phone" value="PHONE" type="radio" name="payment[method]" title="Phone" class="radio" />
										            <label for="p_method_phone">Phone </label>
										    	</dt>
									        	<dd> &nbsp; </dd>
<?php 
	if ($_COOKIE['VIPMember']!="Y") {
?>
									        	<dt>
									        		<input id="chk_giftcode" name="chk_giftcode" type="checkbox" value="1" />
									        		<label for="chk_giftcode">USE GIFTCARD:</label>
									        	</dt>
									        	<dd>
									        		<div class="input-box">
										                <input class="input-text" id="giftcard_code" name="payment[giftcard]" class="input-text required-entry" />
										            </div>
									        	</dd>
<?php 
	}
?>
							    			</dl>
							    		</fieldset>
									</form>
									
									<form name="paypalfrm" action="https://www.paypal.com/cgi-bin/webscr" method="post" id="paypal_form" class="hidden">
										<input type="hidden" name="upload" value="1">
										<input type="hidden" name="bn" value="MiniCart_AddToCart_WPS_US">
										<input type="hidden" name="upload" value="1" />
										<input type="hidden" name="address_override" value="0" />
										<input type="hidden" name="first_name" value="" />
										<input type="hidden" name="last_name" value="" />
										<input type="hidden" name="address1" value="" />
										<input type="hidden" name="address2" value="" />
										<input type="hidden" name="city" value="" />
										<input type="hidden" name="zip" value="" />
										<input type="hidden" name="country" value="" />
										<input type="hidden" name="state" value="" />
										<input type="hidden" name="amount" value="0" />
										<input type="hidden" id="amount_1" name="amount_1" value="" />
										<input type="hidden" name="item_name_1" value="lemonclothing online purchase order." />
										<input type="hidden" name="quantity_1" value="1" />			
										<input type="hidden" name="email" value="" />
										<input type="hidden" name="shipping_1" value="0" />
										<input type="hidden" name="receiver_email" value="fxskin1@gmail.com" />
										<input type="hidden" name="cmd" value="_cart" />
										<input type="hidden" name="charset" value="utf-8" />
										<input type="hidden" name="payer_id" value="" />
										<input type="hidden" name="payer_email" value="" />
										<input type="hidden" name="custom" value="23" />
										<input type="hidden" name="return" value="<?php echo str_replace("http","http",SITE_URL)?>/contents/amazon_check.php" />
										<input type="hidden" name="cancel_return" value="<?php echo str_replace("http","http",SITE_URL)?>/contents/amazon_check.php" />
										<input type="hidden" name="notify_url" value="<?php echo str_replace("http","http",SITE_URL)?>/contents/amazon_check.php" /><!--http://www.lemonclothing.com/contents/_paypalchek.php-->
										<input type="hidden" name="cpp_header_image" value="" />
										<input type="hidden" name="rm" value="2" />
										<input type="hidden" name="bn_1" value="JavaScriptButton_cart" />
										<input type="hidden" name="cbt" value="" /><!--{$return_text}-->
										<input type="hidden" name="image_url" value="img/logo.jpg" />
										<input type="hidden" name="href_1" value="http://www.lemonclothing.com/pr.php">
										<input type="hidden" name="offset_1" value="0">
										<input type="hidden" name="business" value="fxskin1@gmail.com">
										<input type="submit" value="Checkout">
										
									</form>



									<div class="tool-tip" id="payment-tool-tip" style="display:none;">
									    <div class="btn-close"><a href="javascript:void(0);" id="payment-tool-tip-close" title="Close">Close</a></div>
									    <div class="tool-tip-content"><img src="/images/cvv.gif" alt="Card Verification Number Visual Reference" title="Card Verification Number Visual Reference" /></div>
									</div>
	
									<div class="buttons-set" id="payment-buttons-container">
									    <p class="required">* Required Fields</p>
									    <button type="button" class="button" onclick="payment_save()"><span><span>Continue</span></span></button>
									    <span class="please-wait" id="payment-please-wait" style="display:none;">
									        <img src="/images/ajax_loader.gif" alt="Loading next step..." title="Loading next step..." class="v-middle" /> Loading next step...    </span>
									</div>
									<script type="text/javascript">
										$('#p_method_ccsave').click(function() {
											$('#payment_form_ccsave').fadeIn("fast");
											$('#paypalbtn').fadeOut("fast");
										});
										
										$('#p_method_amazon').click(function() {
											$('#payment_form_ccsave').fadeOut("fast");
											$('#paypalbtn').fadeIn("fast");
										});
										
										$('a.cvv-what-is-this').click(function() {
											if ($('#payment-tool-tip').is(":visible")) {
												$('#payment-tool-tip').hide("fast");
											} else {
												$('#payment-tool-tip').show("fast");
											}
											 
										});
										$('#payment-tool-tip-close').click(function() { $('#payment-tool-tip').hide("slow"); });
										$('#chk_giftcode').click(function() {
											if (!$('#chk_giftcode').is(':checked')) {
												$('#giftcard_code').val('');
												$('#giftcard_code').removeClass('validation-failed');
											}
										});
										$('#giftcard_code').focus(function() {
											$('#chk_giftcode').attr("checked", true);
										});
									</script>
								</div>
						    </li>
						    <li id="opc-review" class="section">
						        <div class="step-title">
						            <span class="number"><?php echo ($nStep+5)?></span>
						            <h2>Order Review</h2>
						            <a href="#">Edit</a>
						        </div>
						        <div id="checkout-step-review" class="step a-item" style="display:none;">
						        <form action="" id="co-product-form">
						        	<input type="hidden" name="cart[subtotal]" />
						        	<input type="hidden" name="cart[tax]"/>
						        	<input type="hidden" name="cart[dc_giftcard]"/>
									<input type="hidden" name="cart[dc_member]"/>
						        	<input type="hidden" name="cart[dc_promo]"/>
						        	<input type="hidden" name="cart[saving]"/>
						        	<input type="hidden" name="cart[grandtotal]"/>
						            <div class="order-review" id="checkout-review-load">
						            	<div id="checkout-review-table-wrapper">
										    <table class="data-table" id="checkout-review-table">
										        <colgroup>
										        <col>
										        <col width="1">
										        <col width="1">
										        <col width="1">
										        </colgroup>
										        <thead>
										            <tr class="first last">
										                <th rowspan="1">Product Name</th>
										                <th colspan="1" class="a-center">Price</th>
										                <th rowspan="1" class="a-center">Qty</th>
										                <th colspan="1" class="a-center">Subtotal</th>
										            </tr>
										        </thead>
										        <tbody>
<?php 
	if ($_SESSION['cart']) {
		$tr_css = array("even", "odd");
		$n 		= 1;
		$cnt 	= 0;
		$dc		= 1;
		$bulkchk="N";
		if (!empty($_COOKIE['VIP']['ratio'])) {
			$dc	= 1 - (int) $_COOKIE['VIP']['ratio'] / 100;
		}
		foreach($_SESSION['cart'] as $cart_item => $val) {
			$cart_qty = multiDimArrSum($_SESSION['cart'][$cart_item]);
			$DB = new myDB;
			$DB->query("SELECT Cat1ID, Cat2ID, Picture1, ProductName, UnitPriceOnSale, FeeForPersonalization, QuantityDiscountID, Weight_Pounds, IsTaxable FROM Products WHERE ProductID=".$cart_item);
			list($Cat1ID, $Cat2ID, $prod_img, $prod_name, $prod_price, $persona_fee, $qtydc_price, $prod_weight, $is_taxable) = $DB->fetch_array($DB->res);
			if ($Cat1ID==17 && $Cat2ID==109)
				$bulkchk="Y";
			else
				$bulkchk="N";
			if($qtydc_price>0)
			{
				$strSQL2="SELECT DiscountPercentage1 FROM NewQuantityDiscounts WHERE QD_ID=".$qtydc_price." and LowerQty<=".$cart_qty." and UpperQty>=".$cart_qty;
				$DB3 = new myDB;
				$DB3->query($strSQL2);
				$dcqty = $DB3->fetch_array($DB3->res);
				$QTYDC=$dcqty["DiscountPercentage1"];
				$qdc	= 1 - (int) $QTYDC / 100;
				$prod_price*= $qdc;
			
			}
			
			
			if ($dc < 1) {
				$reg_price = $prod_price;
			}
			$prod_price *= $dc;
			if (!empty($_SESSION['personalized'][$cart_item])) {
				if ($dc < 1) {
					$reg_linetotal = ($reg_price + $persona_fee) * $cart_qty;
				}
				$line_total = ($prod_price + $persona_fee * $dc) * $cart_qty;
				$arrtemp = explode(",", $_SESSION['personalized'][$cart_item][$size]);
				
				
				if($bulkchk=="Y")
				{
					foreach ($_SESSION['personalized'][$cart_item] as $size => $val5) {
						$arrtemp2 	= explode(",", $val5);
						$tname		= trim(str_replace(' ','',$arrtemp2[0]));
						$tbigno		= $arrtemp2[1];
						$tsmallno	= $arrtemp2[2];
						$tshortno	= $arrtemp2[3];
						$nameprice	= strlen($tname) * 1;
						$bignoprice	= $smallnoprice = $shortnoprice = 0;
						if (!empty($tbigno))	$bignoprice		= (strlen($tbigno)) * 2.5;
						if (!empty($tsmallno))	$smallnoprice	= (strlen($tsmallno)) * 1.5;
						if (!empty($tshortno))	$shortnoprice	= (strlen($tshortno)) * 1.5;
						$personal_total += $nameprice + $bignoprice + $smallnoprice + $shortnoprice;	
					}	
					$line_total = formatMoney($prod_price,1) * $cart_qty + formatMoney($personal_total,1);
				}
				
			} elseif (!empty($_SESSION['emblem'][$cart_item])) {
				$emblem_total = 0;
				foreach ($_SESSION['emblem'][$cart_item] as $size => $cost) {
					$emblem_total += $cost;
				}
				if ($dc < 1) {
					$reg_linetotal = ($reg_price + $emblem_total) * $cart_qty;
				}
				$line_total = ($prod_price + $emblem_total) * $cart_qty;
			} else {
				if ($dc < 1) {
					$reg_linetotal = $reg_price * $cart_qty;
				}
				
				$line_total = $prod_price * $cart_qty;
				
			}
			$nontaxable_total += ($is_taxable=='N')? $prod_price: 0;
			$total_weight += $prod_weight * $cart_qty;
			
			if ($coupon_type!=null) {
				$strPromo = "SELECT * FROM Coupons WHERE `coupon_code` = '".$_POST["promo_code"]."' && `coupon_type` = '".$coupon_type."'";
				$DBCoupon = new myDB;
				$DBCoupon->query($strPromo);
				$dataPromo = $DBCoupon->fetch_array($DBCoupon->res);
				echo $strPromo."<br/>";
			}
?>										        
										        	<tr class="<?php echo ($cnt<1)?"first":null?> <?php echo $tr_css[$n]?>">
										    			<td><h3><?php echo $prod_name?></h3>
										                	<dl class="item-options">
<?php
			if (is_array($val) && $bulkchk!="Y") {	// && $persona_fee==0 
				foreach ($val as $size => $val2) {
					echo "<div class=\"cart-product-options\">";
					echo "<dt><span>Size: ".$size."</span>";
					if (!empty($_SESSION['emblem'][$cart_item][$size])) {
						echo " &nbsp; - Emblem attachment: $" . $_SESSION['emblem'][$cart_item][$size];
						echo "<input type=\"hidden\" name=\"product[emblem][".$cart_item."]\" value=\"Y\" />";
						echo "<input type=\"hidden\" name=\"product[emblem_fee][".$cart_item."]\" value=\"".$_SESSION['emblem'][$cart_item][$size]."\" />";
					}
					echo "</dt>";
					
						if (is_array($val2)) {
							foreach ($val2 as $color => $val3) {
								echo "<dd><span>$color: <em>$val3</em> ea</span></dd>\n";
								echo "<input type=\"hidden\" name=\"product[id][]\" value=\"".$cart_item."\"/>";
								echo "<input type=\"hidden\" name=\"product[size][]\" value=\"".$size."\"/>";
								echo "<input type=\"hidden\" name=\"product[color][]\" value=\"".$color."\"/>";
								echo "<input type=\"hidden\" name=\"product[qty][]\" value=\"".$val3."\"/>";
							}
						} else {
							echo "<dd><span>Qty: <em>$val2</em> ea</span></dd>";
							echo "<input type=\"hidden\" name=\"product[id][]\" value=\"".$cart_item."\"/>";
							echo "<input type=\"hidden\" name=\"product[size][]\" value=\"".$size."\"/>";
							echo "<input type=\"hidden\" name=\"product[color][]\" value=\"\"/>";
							echo "<input type=\"hidden\" name=\"product[qty][]\" value=\"".$val2."\"/>";
						}
						echo "</div>";
						
						
						//echo "<input type=\"hidden\" name=\"product[bulk][]\" value=\"N\"/>";
						//echo "<input type=\"hidden\" name=\"product[persona_fee][]\" />";
						//echo "<input type=\"hidden\" name=\"product[persona_data][]\"/>";
				}
				
				//if ($persona_fee > 0) {
					if (!empty($_SESSION['personalized'][$cart_item])) {
						echo "<div class=\"cart-product-options\">";
						echo "<dt><span>Personalization: $".formatMoney($persona_fee * $dc, true)."</span></dt>";
						foreach ($_SESSION['personalized'][$cart_item] as $size => $val5) {
							$arrtemp1 = explode(",", $val5);
							$size1=str_replace('_','(',$size);
							$xsize = explode("_", $size);
							$size2=$xsize[0];
							echo "<dd><span>Size:<em>{$size1}</em> Name:<em>{$arrtemp1[0]}</em>  Number:<em>{$arrtemp1[1]}</em></span></dd>";
							//echo "<input type=\"hidden\" name=\"product[id][]\" value=\"".$cart_item."\"/>";
							//echo "<input type=\"hidden\" name=\"product[size][]\" value=\"".$size2."\"/>";
							//echo "<input type=\"hidden\" name=\"product[color][]\" value=\"".$color."\"/>";
							echo "<input type=\"hidden\" name=\"product[qty][]\" value=\"1\"/>";
							echo "<input type=\"hidden\" name=\"product[bulk][]\" value=\"N\"/>";
							echo "<input type=\"hidden\" name=\"product[persona_fee][{$cart_item}]\" value=\"".formatMoney($persona_fee * $dc, true)."\"/>";
							echo "<input type=\"hidden\" name=\"product[persona_data][{$cart_item}]\" value=\"".$_SESSION['personalized'][$cart_item][$size]."\"/>";
						}
						echo "</div>";
					}
				//}
				
			} elseif (is_array($val) && $bulkchk=="Y")	{	//  && $persona_fee==0

				foreach ($val as $size => $val2) {
					echo "<div class=\"cart-product-options\">";
					echo '<dt><span>Size: '.$size.'</span></dt>';

					if (is_array($val2)) {
						foreach ($val2 as $color => $val3) {
							echo "<dd><span>$color: <em>$val3</em> ea</span></dd>\n";							
						}
					} 
					else {
						echo "<dd><span>Qty: <em>$val2</em> ea</span></dd>";						
					}
				echo "</div>";
				}
				
				if ($persona_fee == 0) {
					echo "<div class=\"cart-product-options\">";
					echo "<dt><span>Personalization</span></dt>";
					foreach ($_SESSION['personalized'][$cart_item] as $size => $val5) {
							$arrtemp1 		= explode(",", $val5);
							$size1			= strtoupper(substr($size, 0, strpos($size, "_")));
							$xname			= trim(str_replace(' ','',$arrtemp1[0]));
							$xbigno			= $arrtemp1[1];
							$xsmallno		= $arrtemp1[2];
							$xshortno		= $arrtemp1[3];
							$dnameprice		= strlen($xname);
							$dbignoprice	= $dsmallnoprice = $dshortnoprice = 0;
							if (!empty($xbigno))	$dbignoprice	= (strlen($xbigno)) * 2.5;
							if (!empty($xsmallno))	$dsmallnoprice	= (strlen($xsmallno)) * 1.5;
							if (!empty($xshortno))	$dshortnoprice	= (strlen($xshortno)) * 1.5;
							$dtotal = $dnameprice + $dbignoprice + $dsmallnoprice + $dshortnoprice;
							
							echo "<dd><span>Size(<em>{$size1}</em>),Name(<em>{$arrtemp1[0]}</em>),BigNo:(<em>{$arrtemp1[1]}</em>),Small(<em>{$arrtemp1[2]}</em>),Short(<em>{$arrtemp1[3]}</em>) = <em>\$".formatMoney($dtotal,1)."</em></span></dd>";
							echo "<input type=\"hidden\" name=\"product[id][]\" value=\"".$cart_item."\"/>";
							echo "<input type=\"hidden\" name=\"product[size][]\" value=\"".$size1."\"/>";
							echo "<input type=\"hidden\" name=\"product[color][]\" value=\"".$color."\"/>";
							echo "<input type=\"hidden\" name=\"product[qty][]\" value=\"1\"/>";
							echo "<input type=\"hidden\" name=\"product[bulk][]\" value=\"Y\"/>";
							echo "<input type=\"hidden\" name=\"product[bulk_unit_price][]\" value=\"".formatMoney($prod_price,1)."\"/>";
							echo "<input type=\"hidden\" name=\"product[persona_fee][]\" value=\"".formatMoney($dtotal, true)."\"/>";
							echo "<input type=\"hidden\" name=\"product[persona_data][]\" value=\"".$_SESSION['personalized'][$cart_item][$size]."\"/>";
						}
					echo "</div>";
				} else {
					
				}
			}
			
			/*
			if (is_array($val) && $bulkchk!="Y") {	// && $persona_fee>0 
				
				
				foreach ($val as $size => $val2) {
					echo "<div class=\"cart-product-options\">";
					echo '<dt><span>Size: '.$size.'</span></dt>';

					if (is_array($val2)) {
						foreach ($val2 as $color => $val3) {
							echo "<dd><span>$color: <em>$val3</em> ea</span></dd>\n";
							/*echo "<input type=\"hidden\" name=\"product[id][]\" value=\"".$cart_item."\"/>";
							echo "<input type=\"hidden\" name=\"product[size][]\" value=\"".$size."\"/>";
							echo "<input type=\"hidden\" name=\"product[color][]\" value=\"".$color."\"/>";
							echo "<input type=\"hidden\" name=\"product[qty][]\" value=\"".$val3."\"/>";*/
			/*				
						}
					} else {
						echo "<dd><span>Qty: <em>$val2</em> ea</span></dd>";
						/*echo "<input type=\"hidden\" name=\"product[id][]\" value=\"".$cart_item."\"/>";
						echo "<input type=\"hidden\" name=\"product[size][]\" value=\"".$size."\"/>";
						echo "<input type=\"hidden\" name=\"product[color][]\" value=\"\"/>";
						echo "<input type=\"hidden\" name=\"product[qty][]\" value=\"".$val2."\"/>";*/
			/*			
					}
					echo "</div>";
				}
				
				
				/*				
				echo "<div class=\"cart-product-options\">";
				echo "<dt><span>Personalization: $".formatMoney($persona_fee * $dc, true)."</span></dt>";
				echo "<dd><span>&bull; Name: <em>&quot;{$arrtemp[0]}&quot;</em></dd>";
				echo "<dd><span>&bull; Number: <em>&quot;{$arrtemp[1]}&quot;</em></dd>";
				
				echo "<input type=\"hidden\" name=\"product[persona_fee][]\" value=\"".formatMoney($persona_fee * $dc, true)."\"/>";
				echo "<input type=\"hidden\" name=\"product[persona_data][]\" value=\"".$_SESSION['personalized'][$cart_item]."\"/>";
				echo "</div>";*/
			/*
			} 
			/*else {
				echo "<input type=\"hidden\" name=\"product[bulk][]\" value=\"N\"/>";
				echo "<input type=\"hidden\" name=\"product[persona_fee][]\" />";
				echo "<input type=\"hidden\" name=\"product[persona_data][]\"/>";
			}*/
			
?>
										                    </dl>
										                </td>
										        		<td class="a-right">
										                    <span class="cart-price">$<?php echo formatMoney($prod_price,2)?></span>            
														</td>
										            	<td class="a-center"><?php echo $cart_qty?></td>
										        		<td class="a-right last">
										                    <span class="cart-price">$<?php echo formatMoney($line_total,2)?></span>
										            	</td>
										        	</tr>
<?php
	/*		if($dataPromo["product_id"]==$cart_item){
				echo $cart_item."<br/>";
				$promoDiscount = formatMoney($line_total,2);
				echo $promoDiscount."<br/>";
			}		*/	

			$cnt++;
			$n = 1 - $n;
			$subtotal += $line_total;
			$reg_subtotal += $reg_linetotal;
			//$bulkchk="N";
		}
		if ($dc < 1) {
			$total_saving = $reg_subtotal - $subtotal;
		}
		
		
		if($dataPromo["product_id"]==null){
			$promoPercent = $dataPromo["percentage_discount"];
			$promoDiscount = formatMoney($subtotal,1) * ($promoPercent * 0.01);
		}
	}
	
?>
<?php 
			if($dataPromo["product_id"]!=null && formatMoney($subtotal,1) >= $dataPromo["minimum_order"]){
				$freeGift = "Y";
?>	
													<tr class="<?php echo $tr_css[$n+1]?>">
														<td><h3>Free Gift</h3></td>
														<td class="a-right"><span class="cart-price"></span></td>
														<td class="a-center"></td>
														<td class="a-right last"><span class="cart-price"></span></td>
													</tr>
<?php 		}?>																			    	
										        </tbody>
										        <tfoot>
										        	<tr class="first">
										    			<td style="" class="a-right" colspan="3">Subtotal</td>
										    			<td style="" class="a-right last">
										    				<input type="hidden" id="my-nontaxabletotal" value="<?php echo $nontaxable_total?>"/>
										    				<input type="hidden" id="my-giftcard-amount" />
										    				<input type="hidden" id="my-promo-amount" value="<?php echo formatMoney($promoDiscount,1)?>"/>
										    				<input type="hidden" id="my-saving" value="<?php echo formatMoney($total_saving,1)?>" />
										    				<input type="hidden" id="my-freegift" value="<?php echo $freeGift?>" />
										    				<span class="price" id="my-subtotal">$<?php echo formatMoney($subtotal,1)?></span>
										    			</td>
													</tr>
													<tr>
													    <td style="" class="a-right" colspan="3">Local Tax </td>
													    <td style="" class="a-right last"><span class="price" id="my-tax"></span></td>
													</tr>
													<tr>
													    <td style="" class="a-right" colspan="3">Shipping &amp; Handling 
<?php 
	if ($memberlebel=='diamond') {
?>
													(Diamond Member discount)
<?php 
	}
?>														
														</td>
													    <td style="" class="a-right last"><span class="price" id="my-shipping"></span></td>
													</tr>
<?php 
	if ($_COOKIE['VIPMember']!='Y') {
?>
													<tr>
													    <td style="" class="a-right" colspan="3">Gift Card </td>
													    <td style="" class="a-right last"><span class="price" id="my-discount"></span></td>
													</tr>
<?php 
	}
?>

<?php 
	if (($memberlebel=='gold') or ($memberlebel=='platinum')) {
?>
													<tr>
													    <td style="" class="a-right" colspan="3">Member Discount </td>
													    <td style="" class="a-right last"><span class="price" id="member-discount"></span></td>
													</tr>
<?php 
	}
?>

<?php 
	if ($promoDiscount) {
?>
													<tr>
													    <td style="" class="a-right" colspan="3"> Other Discounts Tendered </td>
													    <td style="" class="a-right last"><span class="price" id="my-promo">$<?php echo formatMoney($promoDiscount,1);?></span></td>
													</tr>
<?php 
	}
?>
										    		<tr class="last">
														
										    			<td style="" class="a-right" colspan="3"><strong>Grand Total</strong></td>
										    			<td style="" class="a-right last"><strong><span class="price" id="my-grandtotal"></span></strong><input type="hidden" name="hgrandtotal" id="hgrandtotal"></td>
													</tr>
<?php 
	if ($total_saving > 0) {
?>
										    		<tr class="last">
										    			<td style="" class="a-right" colspan="3"><strong>VIP Member Savings</strong></td>
										    			<td style="" class="a-right last"><strong><span class="saving" id="my-saving">$<?php echo formatMoney($total_saving,1)?></span></strong></td>
													</tr>
<?php 
	}
?>													
										    	</tfoot>
										    </table>
										</div>
										
										<div id="checkout-review-submit">
    
										    <div class="buttons-set" id="review-buttons-container">
										    	<input type="hidden" name="prod_img" value="<?php echo $_POST["$prod_img"]?>" />
										        <p class="f-left">Forgot an Item? <a href="/?page=mycart">Edit Your Cart</a></p>
										        <button type="button" title="Place Order" class="button btn-checkout" onclick="review_save();"><span><span>Place Order</span></span></button>
										        <span class="please-wait" id="review-please-wait" style="display:none;">
										            <img src="/images/ajax_loader.gif" alt="Submitting order information..." title="Submitting order information..." class="v-middle"> Submitting order information...        </span>
										    </div>
										    <div id="paypalbtn" style="display:none;margin-top:5px;">
											<div style="display:inline; margin: 10px 0 10px 9px; font: bold 14px/1.6 Tahoma, Helvetica, sans-serif; float:left;">Please <span style="color:#f00;">DO NOT CLOSE PayPal</span> window before it's closed automatically.</div>
											<!--<a href="javascript:void(0);" class="paypalbtn" onclick="amsubmit();">--><img src="/images/paypal_btn.png" border="0" style="width:200px;height:40px;cursor: pointer;" onclick="amsubmit();"/><!--</a>-->
											<script type="text/javascript">
											function amsubmit(){
												//alert('xx');
												document.paypalfrm.first_name=document.getElementById('billing:firstname').value;
												document.paypalfrm.last_name=document.getElementById('billing:lastname').value;
												document.paypalfrm.email=document.getElementById('billing:email').value;
												document.paypalfrm.payer_email=document.getElementById('billing:email').value;
												document.paypalfrm.address1=document.getElementById('billing:street1').value;
												document.paypalfrm.address2=document.getElementById('billing:street2').value;
												document.paypalfrm.city=document.getElementById('billing:city').value;
												document.paypalfrm.zip=document.getElementById('billing:postcode').value;
												document.paypalfrm.country=document.getElementById('billing:country_id').value;
												document.paypalfrm.state=document.getElementById('billing:region_id').value;
												document.getElementById('amount_1').value=parseFloat(document.getElementById('hgrandtotal').value);
												//document.paypalfrm.amount_1=1;//parseFloat(document.getElementById('hgrandtotal').value);
												window.open('','CallMePopUp','status=no,etc,scrollbars=yes,resizable=yes,width=995px,height=680px');
												document.paypalfrm.target='CallMePopUp';
												document.paypalfrm.submit();
											}
											</script>
										</div>
										    <!--<div id="amazonbtn" style="display:none;">
										    	<a href="javascript:voic(0);" class="amazonbtn" onclick="amsubmit()"><img src="/images/golden_large_paynow_withmsg_whitebg.gif" border="0" /></a>
												<script type="text/javascript">
												function amsubmit(){
													window.open('','CallMePopUp','status=no,etc,scrollbars=yes,resizable=yes,width=695px,height=680px');
													document.amazonfrm.target='CallMePopUp';
													document.amazonfrm.submit();
												}
												</script>
											</div>-->			
										    
										</div>
										
						    		</div>
						    	</form> 

									<!--<form name="amazonfrm" action="#" target="CallMePopUp" method="post">
									  <input type="hidden" name="returnUrl" value="<?php echo str_replace("http","http",SITE_URL)?>/contents/amazon_check.php" >
									  <input type="hidden" name="ipnUrl" value="<?php echo SITE_URL?>/?info=aboutus" >
									  <input type="hidden" name="processImmediate" value="1" >
									  <input type="hidden" name="signatureMethod" value="HmacSHA256" >
									  <input type="hidden" name="accessKey" value="AKIAJ5TKM5ZEBJC4B4PQ" >
									  <input type="hidden" name="collectShippingAddress" value="0" >
									  <input type="hidden" name="isDonationWidget" value="0" >
									  <input type="hidden" name="amazonPaymentsAccountId" value="7e4e60aa14308e77062c5c05edb9445d5b3605ef19661ffa62de0d69497eb422" >
									  <input type="hidden" name="referenceId" value="111" >
									  <input type="hidden" name="cobrandingStyle" value="logo" >
									  <input type="hidden" name="immediateReturn" value="1" >
									  <input type="hidden" name="amount" value="" >
									  <input type="hidden" name="description" value="Lemontreeclothing shopping" >
									  <input type="hidden" name="abandonUrl" value="<?php echo SITE_URL?>" >
									  <input type="hidden" name="signatureVersion" value="2" >
									  <input type="hidden" name="signature" value="qkZBRe1sK4aC8ONQwO4DzOjfG4VzDLLM+wWGBdat" >
									</form>-->

								
						        </div>
						    </li>
						</ol>

					</div>
                                            
                                        </div>
                                        <!-- container CLOSE-->
                                        
                                        
                                        
					<div class="modal"></div>
					<script type="text/javascript">
					$(document).ready(function() {
						$('input[name=checkout_method]').click(function() {
							$('#billing\\:checkoutas').val($(this).val());
						});
						
						$('div.inner_alert > button').click(function() {
							$('div.alert').clearQueue();
							$('div.alert').slideUp(1000);

						});
					});
					</script>
<?php 
	if (!empty($_COOKIE['userID'])) {
		echo "<script>checkout_step('billing'); address_fillup('".$_COOKIE['userID']."');</script>";
	}
	if ($total_weight > 0) {
		echo "<script>putShippingWeight('shipping\\\:lb_weight',".$total_weight.")</script>";
	}
?>