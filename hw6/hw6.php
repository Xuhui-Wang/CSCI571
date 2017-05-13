<?php
 function handleEvent(){
 	echo "<h1>Zero results found!</h1>";
 }
 ?>
 <html>
 	<head>
 		<title>CSCI 571 HOMEWORK 6</title>
 		<style type="text/css">
 		H1{
 			text-align: center;
 		}
 		form{
 			position: relative;
 			margin-left: 30%;
 			font-size: 16pt;
 		}
 		fieldset{
 			border: 3px solid;
 			width: 50%;
 		}
 		select{
 			font-size: 12pt;
 		}
 		img{
 			float: right;
 		}
 		p{
 			font-weight: 100;
 			font-style: italic;
 			font-size: 12pt;
 		} 
 		</style>

 	</head>
 	<body>
 		<H1>Real Estate Search</H1>
 		<form name="myform" method="POST" onsubmit="return contentCheck()">
 			<fieldset>
 				<table>
 					<tr><td>Street Address*:</td><td><input type = 'text' name = 'street'></td></tr>
 					<tr><td>City*:</td><td><input type='text' name='city'></td></tr>
 					<tr><td>State*:</td><td><select name='state'>
 						<option value="">--</option>
 						<option value="AK">AK</option>
						<option value="AL">AL</option>
						<option value="AR">AR</option>
						<option value="AZ">AZ</option>
						<option value="CA">CA</option>
						<option value="CO">CO</option>
						<option value="CT">CT</option>
						<option value="DC">DC</option>
						<option value="DE">DE</option>
						<option value="FL">FL</option>
						<option value="GA">GA</option>
						<option value="HI">HI</option>
						<option value="IA">IA</option>
						<option value="ID">ID</option>
						<option value="IL">IL</option>
						<option value="IN">IN</option>
						<option value="KS">KS</option>
						<option value="KY">KY</option>
						<option value="LA">LA</option>
						<option value="MA">MA</option>
						<option value="MD">MD</option>
						<option value="ME">ME</option>
						<option value="MI">MI</option>
						<option value="MN">MN</option>
						<option value="MO">MO</option>
						<option value="MS">MS</option>
						<option value="MT">MT</option>
						<option value="NC">NC</option>
						<option value="ND">ND</option>
						<option value="NE">NE</option>
						<option value="NH">NH</option>
						<option value="NJ">NJ</option>
						<option value="NM">NM</option>
						<option value="NV">NV</option>
						<option value="NY">NY</option>
						<option value="OH">OH</option>
						<option value="OK">OK</option>
						<option value="OR">OR</option>
						<option value="PA">PA</option>
						<option value="RI">RI</option>
						<option value="SC">SC</option>
						<option value="SD">SD</option>
						<option value="TN">TN</option>
						<option value="TX">TX</option>
						<option value="UT">UT</option>
						<option value="VT">VT</option>
						<option value="VA">VA</option>
						<option value="WA">WA</option>
						<option value="WI">WI</option>
						<option value="WV">WV</option>
						<option value="WY">WY</option>
 					</select></td></tr> 	
 					<tr><td></td><td><input type='submit' name='search' value = 'Search' style="font-size:12pt;width:100px"></td></tr>
 				</table>
 				<img src="http://www.zillow.com/widgets/GetVersionedResource.htm?path=/static/logos/Zillo wlogo_150x40_rounded.gif" width="150" height="40" alt="Zillow Real Estate Search" />
 				<p>* - Mandatory fields</p>
 			</fieldset>		
 		</form>
 		<script type="text/javascript">
 		function contentCheck(){
		 	var bStreet = false;
			var bCity = false;
			var bState = false;
			if(document.myform.street.value != ""){
				bStreet = true;
			}
			if(document.myform.city.value != ""){
				bCity = true;
			}
			if(document.myform.state.value != ""){
				bState = true;
			}
			var alertMsg = "";
			if(!bStreet || !bCity || !bState){
				alertMsg = "Please enter values for the following fields:\n "
				if(bStreet == false){
					alertMsg += "Street Address\n";
				}
				if(bCity == false){
					alertMsg += "City\n";
				}
				if(bState == false){
					alertMsg += "State\n";
				}
				alert(alertMsg);
				return false;
			}
			else{
				return true;
			}
		}	
 		</script>
 		<?php
 		if($_POST["search"]){
  			handleEvent();
  		}	
 		?>
 	</body>
 </html>