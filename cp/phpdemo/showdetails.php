<?php 
	// Connect to your Database 
	
	//mysql_connect("localhost", "root", "kshlyh0409") or die(mysql_error()); 
	//mysql_select_db("eworldbaby") or die(mysql_error()); 

	$recordid=$_GET['recordid'];
	
	include('function.php');

	$DB = new myDB;
	$strSQL="SELECT id as record_id, parentid, cSponsorX,cUser_Num,cFistName, nDirectCT,nEntireCT,cLastName, cCellNumb, cUserIDNO,itemtype,c1stValue,c2ndValue,nSMS_Numb,cAddressX,cCityName,cProvince,cZipsCode FROM acc_user  where id=".$recordid." order by id";
	//print_r($strSQL);
	$DB->query($strSQL);
	while($data = $DB->fetch_array($DB->res)) {	
		$record_id=$data["record_id"];
		$parentid=$data["parentid"];
		$cSponsorX=$data["cSponsorX"];
		$cUser_Num=$data["cUser_Num"];
		$cFistName=$data["cFistName"];
		$cLastName=$data["cLastName"];
		$cCellNumb=$data["cCellNumb"];
		$cEmail=$data["cUserIDNO"];
		$nSMS_Numb=$data["nSMS_Numb"];
		$cAddressX=$data["cAddressX"];
		$cCityName=$data["cCityName"];
		$cProvince=strtoupper($data["cProvince"]);
		$cZipsCode=$data["cZipsCode"];
			
	}
	
//print_r($response);
//exit;

?>
<!DOCTYPE html> 
<html>
<head>
	<title>BigTMS  Genealogy</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body style="font-size:12px">
	<form action="showdetails_action.php" method="post" >
	<input type="hidden" name="record_id" value="<?php echo $record_id?>">
	<table>
	<tr>
	<td>
	Sponsor
	</td>
	<td>
	<?php echo $cSponsorX?>
	</td>
	</tr>

	<tr>
	<td>
	ID
	</td>
	<td>
	<?php echo $cUser_Num?>
	</td>
	</tr>

	<tr>
	<td>
	First Name
	</td>
	<td>
	<input type="text" name="cFistName" value="<?php echo $cFistName?>" style="width:300px;">
	</td>
	</tr>

	<tr>
	<td>
	Last Name
	</td>
	<td>
	<input type="text" name="cLastName" value="<?php echo $cLastName?>" style="width:300px;">
	</td>
	</tr>

	<tr>
	<td>
	Email
	</td>
	<td>
	<input type="text" name="cEmail" value="<?php echo $cEmail?>" style="width:300px;">
	</td>
	</tr>

	<tr>
	<td>
	Phone
	</td>
	<td>
	<input type="text" name="cCellNumb" value="<?php echo $cCellNumb?>" style="width:300px;">
	</td>
	</tr>

	<tr>
	<td>
	Wireless Carrier
	</td>
	<td>
	<?php 
		$sDB = new myDB;
		$smsSQL = "SELECT * FROM spt_SMS  WHERE cCountryX = 'US' Order BY nSortNo";	
	
		//print_r($smsSQL);		
		$sDB->query($smsSQL);
//print_r($nSMS_Numb);
	
	echo '<select name="tnSMS_Numb" size="1" class="inputorder">'; 
       
		 echo '<option value="">Wireless Carrier</option>';
		  while ($sdata = $sDB->fetch_array($sDB->res)){
			  echo '<option value="'.$sdata["nSMS_Numb"].'"' .($nSMS_Numb==(int)$sdata["nSMS_Numb"]?"selected=selected":"") .'>'.$sdata["cCarriers"].'</option>';
	   }
	   $sDB->close();
		 ?>
		  
               <option value="00" >I don't know.</option>

          </select>
	</td>
	</tr>


	<tr>
	<td>
	Address
	</td>
	<td>
	<input type="text" name="cAddressX" value="<?php echo $cAddressX?>" style="width:300px;">
	</td>
	</tr>
	<tr>
	<td>
	City
	</td>
	<td>
	<input type="text" name="cCityName" value="<?php echo $cCityName?>" style="width:300px;">
	</td>
	</tr>
	<tr>
	<td>
	State
	</td>
	<?php 
	$tDB = new myDB;
	$stateSQL = "SELECT * FROM tcState ";	
	
		//print_r($cProvince);		
		$tDB->query($stateSQL);

	echo '<td><select name="cProvince" size="1" class="inputorder">'; 
		 echo '<option value="">--Select--</option>';
		  while ($tdata = $tDB->fetch_array($tDB->res)){
			  echo '<option value="'.$tdata["iso"].'"' .($cProvince==$tdata["iso"]?"selected=selected":"") .'>'.$tdata["name"].'</option>';
			   }
			echo '</select>';
	    $tDB->close();
		 ?>

	<!--<td>
	<input type="text" name="cProvince" value="<?php echo $cProvince?>" style="width:300px;">-->
	</td>
	</tr>
	<tr>
	<td>
	Zip Code
	</td>
	<td>
	<input type="text" name="cZipsCode" value="<?php echo $cZipsCode?>" style="width:300px;">
	</td>
	</tr>



	<tr>
	<td colspan="2">
	<input type="submit" value="Save and Close">
	</td>
	
	</tr>
	
	</table>
	</form>
</body>
</html>