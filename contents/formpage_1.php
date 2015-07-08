<?php

switch($arrGet[1][1]) {

	case "create":
?>
<script type="text/javascript">

function AddOrUpdateConfirm(frm) {
	
	//var x=checkEmail(document.getElementById('email_address').value);
	//alert(x);
	if (frm.firstname.value == '') {
		alert("Please fill out your firstname!");
		frm.firstname.focus();
		return false;
	}
	if (frm.lastname.value == '') {
		alert("Please fill out your lastname!");
		frm.lastname.focus();
		return false;
	}
	
	if (document.getElementById('email_address').value == '') {
		alert("Please fill out your email!");
		document.getElementById('email_address').focus();
		return false;
	}
	
	if (document.getElementById('password').value == '') {
		alert("Please fill out your password!");
		document.getElementById('password').focus();
		return false;
	}
	if (document.getElementById('password').value.length <6 ) {
		alert(" Password ! Must be over 7 characters");
		document.getElementById('password').focus();
		return false;
	}
	if (frm.confirmation.value == '') {
		alert("Please fill out your Confirm Password!");
		frm.confirmation.focus();
		return false;
	}
	if (frm.confirmation.value != frm.password.value) {
		alert("Not match Confirm Password!");
		frm.confirmation.focus();
		return false;
	}
	if (checkEmail(document.getElementById('email_address').value)) {
			alert("The email address is already registered with us.");
			//$('#billing\\:email').addClass("validation-failed");
	}	
	else
		frm.submit();
 	
}	
</script>
<div class="customer main-col1 container">
	<div class="account-create">
	    
	    <form action="../contents/member_action.php" method="post" id="form-validate">
	        <input type="hidden" name="login[returnurl]" value="<?php echo $_SERVER['HTTP_REFERER']?>" />
			<div class="fieldset">
	            <input type="hidden" name="success_url" value="" />
	            <input type="hidden" name="error_url" value="" />
				<input type="hidden" name="action" value="add" />
	            <h2 class="legend"></h2>
	            <ul class="form-list">
	                <li class="fields">
	                    <div class="customer-name">
						    <div class="field name-firstname">
						        <label for="firstname" class="required"><em>*</em>First Name</label>
						        <div class="input-box">
						            <input type="text" id="firstname" name="firstname" value="" title="First Name" maxlength="255" class="input-text required-entry"  />
						        </div>
						    </div>
						    <div class="field name-lastname">
						        <label for="lastname" class="required"><em>*</em>Last Name</label>
						        <div class="input-box">
						            <input type="text" id="lastname" name="lastname" value="" title="Last Name" maxlength="255" class="input-text required-entry"  />
						        </div>
						    </div>
						</div>
	                </li>
	                <li class="fields">
	                	<div class="customr-info">
	                		<div class="field email">
		                    	<label for="email_address" class="required"><em>*</em>Email Address</label>
		                    	<div class="input-box">
		                        	<input type="text" name="login[userid]" id="email_address" value="" title="Email Address" class="input-text validate-email required-entry" />
		                    	</div>
		                    </div>
		                    <!--<div class="field birthday">
		                    	<label>Date of Birth</label>
		                    	<div class="birth-info">
		                    		<div class="select-box">
				                    	<select name="birth_year" style="width: 95px;">
				                    		<option>Year</option>
				                    	<?php for($i = date('Y'); $i>=date('Y') - 110; $i--){?>
				                    		<option value="<?php echo $i;?>"><?php echo $i;?></option>
				                    	<?php }?>
				                    	</select>
			                    	</div>
			                    	<div class="select-box">
				                    	<select name="birth_month" style="width: 95px;">
				                    		<option>Month</option>
				                    	<?php for($i=1; $i<=12; $i++){?>
				                    		<option value="<?php echo $i;?>"><?php echo $i;?></option>
				                    	<?php }?>
				                    	</select>
			                    	</div>
			                    	<div class="select-box">
				                    	<select name="birth_date" style="width: 95px;">
				                    		<option>Date</option>
				                    	<?php for($i = 1; $i <= 31; $i++){?>
				                    		<option value="<?php echo $i;?>"><?php echo $i;?></option>
				                    	<?php }?>
				                    	</select>
			                    	</div>
		                    	</div>-->
		                    </div>
	                    </div>
	                </li>
	                
	            </ul>
	        </div>
	        <div class="fieldset">
		        <!--<h2 class="legend">Login Information</h2>-->
		        <ul class="form-list">
	                <li class="fields">
	                    <div class="field">
	                        <label for="password" class="required"><em>*</em>Password(6 to 16)</label>
	                        <div class="input-box">
	                            <input type="password" name="login[password]" id="password" title="Password" class="input-text required-entry validate-password" />
	                        </div>
	                    </div>
	                    <div class="field">
	                        <label for="confirmation" class="required"><em>*</em>Confirm Password</label>
	                        <div class="input-box">
	                            <input type="password" name="confirmation" title="Confirm Password" id="confirmation" class="input-text required-entry validate-cpassword" />
	                        </div>
	                    </div>
	                </li>
					<!--<li class="control" style="clear: both;">
	                    <div class="input-box">
	                        <input type="checkbox" name="is_subscribed" title="Sign Up for Newsletter" value="1" id="is_subscribed" class="checkbox" />
	                    </div>
	                    <label for="is_subscribed">Newsletter</label>
	                </li>-->
	            </ul>
				
	            
				<ul class="form-list">

				<li id="shipping-new-address-form">
				<fieldset>
					<input type="hidden" name="shipping[address_id]" value="" id="shipping:address_id" />
					<ul>

	               
					
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
						<div class="field">
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
						<div class="field">
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
				
				<li class="no-display">
					<input type="hidden" name="billing[save_in_address_book]" value="1" />
				</li>
				<script type="text/javascript">
					$('select[id$="country_id"]').live("change", function() {

					//alert('xxx');
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
				</fieldset>
				
				</ul>
				
	        </div>
	        <div class="buttons-set">
	            <p class="required">* Required Fields</p>
	            <p class="back-link"><a href="/" class="back-link"><small>&laquo; </small>Back</a></p>
	            <button type="button" title="Submit" class="button" onClick="return AddOrUpdateConfirm(this.form);"><span><span>Submit</span></span></button>
	        </div>
	    </form>
	</div>
</div>


<?php	
    	break;	
	case "login":
	
	

?>

<div class="customer main-col1 container">
	<div class="account-login">
	    <div class="page-title">
	        <h1>&nbsp;</h1>
	    </div>
        <form name="frmr" action="../contents/member_action.php" method="post" id="login-form">
		<input type="hidden" name="login[returnurl]" value="<?php echo $_SERVER['HTTP_REFERER']?>" />
		<input type="hidden" name="action" value="login" />
        <div class="col-md-12">
            <div class="col-md-4" >
                <div class="content">
                    
                   
                	
                </div>
            </div>
            <div class="col-md-5 registered-users">
                <div class="content">
                    <h2>Registered Customers</h2>
                   <ul class="form-list">
                        <li>
                            <label for="email" class="required"><em>*</em>Email Address</label>
                            <div class="input-box">
                                <input type="text" name="login[userid]" value="" id="loginuser" class="col-md-2 input-text required-entry validate-email" title="Email Address" />

                            </div>
                        </li>
                        <li>
                            <label for="pass" class="required "><em>*</em>Password</label>
                            <div class="input-box">
                                <input type="password" id="loginpass" name="login[password]" class="col-md-2 input-text required-entry validate-password" id="pass" title="Password" />
                            </div>
                        </li>
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
					<script type="text/javascript">
					//<![CDATA[
					    function toggleRememberMepopup(event){
					        if($('remember-me-popup')){
					            var viewportHeight = document.viewport.getHeight(),
					                docHeight      = $$('body')[0].getHeight(),
					                height         = docHeight > viewportHeight ? docHeight : viewportHeight;
					            $('remember-me-popup').toggle();
					            $('window-overlay').setStyle({ height: height + 'px' }).toggle();
					        }
					        Event.stop(event);
					    }

					   /* document.observe("dom:loaded", function() {
					        new Insertion.Bottom($$('body')[0], $('window-overlay'));
					        new Insertion.Bottom($$('body')[0], $('remember-me-popup'));

					        $$('.remember-me-popup-close').each(function(element){
					            Event.observe(element, 'click', toggleRememberMepopup);
					        })
					        $$('#remember-me-box a').each(function(element) {
					            Event.observe(element, 'click', toggleRememberMepopup);
					        });
					    });*/
					//]]>
					</script>
                    <p class="required">* Required Fields</p>
                	<div class="buttons-set">
	                    <a href="/?page=customer&account=retrieve" class="f-left">Forgot Your Password?</a>
	                    <button type="button" class="button" onClick="return LoginConfirm(this.form);" title="Login" name="send" id="send2"><span><span>Login</span></span></button>
            		</div>
					<div class="buttons-set col-md-5" style="  margin-top: 10px;">
                    	<button type="button" title="Create an Account" class="button" onclick="window.location='?page=customer&account=create';"><span><span>Create</span></span></button>
        			</div>	
				</div>
            </div>
        </div>
		</form>

		

	</div>
</div>
<script type="text/javascript">
function LoginConfirm(frmr) {
if (document.getElementById('loginuser').value == '') {
		alert("Please fill out your email!");
		document.getElementById('loginuser').focus();
		return false;
	}
	if (document.getElementById('loginpass').value == '') {
		alert("Please fill out your Confirm Password!");
		document.getElementById('loginpass').focus();
		return false;
	}
	else
		frmr.submit();
}
</script>
<?php

		break;
}

?>