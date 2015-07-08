<?php 
$userID=!empty($_COOKIE["userID"]);
if (empty($userID))
{
echo "<script>
alert('Please login first');
window.location='/?page=customer&account=login';
</script>";
}

//include "../include/function.php";

$strSQL = "SELECT a.*,b.ProductName,b.StyleNo,b.BrandName,b.Picture1,b.UnitPriceOnSale FROM Wishlist a,Products b WHERE a.LoginID = '" . $userID."' and a.ProductID=b.ProductID and b.IsActive='Y'";
$DB = new myDB;
$DB->query($strSQL);
?>


<div class="main-col1 col-md-9">
	<script type="text/JavaScript" src="/js/cloud-zoom.1.0.3.min.js"></script>
	<script type="text/javascript" src="/js/jquery.jqtransform.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('.wajax').colorbox({rel:'ajax'});
	});
	</script>

	<script>
	function del(id,userID){
		var r=confirm("Do you want to delete?")
		if(r==true){
			//alert(id);
			//alert(userID);
			//wishdel (id,userID);
			window.location ="/lib/wish_action.php?action=del&id="+id;
		}
		else{
			return false;
		}
	}
	</script>

    <div class="page-title">
		<h1><span>My Wishlist</span></h1>
	</div>
    
	<table class="table_jy">
		<tbody>
			<tr>
				<th class="subject1_2 subject_img">No</th>
				<th class="subject1_2 subject_img">Product Image</th>
				<th class="subject1_2 subject_img">Product Name</th>	  
				<th class="subject1_2 subject_img">Unit Price</th>
				<th class="subject1_2 subject_img"></th>
			</tr>
<?php
	$n=1;
	while ($data = $DB->fetch_array($DB->res)){?>
			<tr class="thin_border_bottom">
				<td class="general_c" style="vertical-align: middle;"><?php echo $n;?></td>
				<td class="general_c">
					<a class="wajax" href="/contents/wquickproduct.php?pid=<?php echo $data["ProductID"];?>">
						<img src="../Images_Products/<?php echo $data["Picture1"];?>" width="70" border="0">
					</a>
				</td>
				<td class="general" style="vertical-align: middle;">
					<a href="/?pid=<?php echo $data["ProductID"];?>">
						<?php echo $data["ProductName"];?><br/>
						<span style="margin-right: 10px;">Brand: <?php echo $data["BrandName"];?> </span>
						Item Number: <?php echo $data["StyleNo"];?>
					</a>
				</td>
				<td class="general_c" style="vertical-align: middle;"><?php echo $data["UnitPriceOnSale"];?></td>
				<td class="general_c" style="vertical-align: middle;" onclick="del(<?php echo $data["ProductID"];?>,'<?php echo $_COOKIE["userID"];?>')">
					<div><!-- trash can image --></div>
				</td>
			</tr>
<?php 
		$n+=1;
	}
?>
			
		 </tbody>
	 </table>
 </div>

</div>