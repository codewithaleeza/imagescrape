<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/x-icon" href="scrape.ico" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins|Work+Sans&display=swap" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="style.css">
<title>Website Image Scraper </title>
<style>
body{
	background: #1c92d2;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right, #f2fcfe, #1c92d2);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right, #f2fcfe, #1c92d2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
img{
	max-height:300px;
	max-width:500px;
	object-fit: scale-down;

}
</style>
</head>

<body>

<div class="container ">


  <center> <img src="scrape.ico" style="height:100px;"> <h1>Website's Image Scraper</h1></center>
<hr>
<div class="wrap justify-content-center">
  <form action="" method="GET">
<div class="row justify-content-center">
     <label><b>Please Enter Web Address: (Follow this format : https://www.example.com) </b></label>
	 </div>
<div class="row justify-content-center">
      <input type="text" name="domain" style="width:60%;height:50px;" class="form-control" placeholder="http://www.example.com">
      <button type="submit" class="btn btn-primary"style="height:50px; width:100px;">
        <i class="fa fa-search">SCRAPE</i>
     </button>
</div>
   </form> <br>
	 <br>
	 <hr><br>
	 <h1 style="color:red">Results: </h1>
   <?php
 error_reporting(0);
 if(isset($_GET['domain'])){
	 //get data
 	$html = file_get_contents($_GET['domain']);
	$domain=$_GET['domain'];
 	//init
 	$matches = array();
 	//Here’s the code for grabbing the images
 	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $html, $matches,PREG_SET_ORDER );
 	//display
	if(empty($domain)){
	    echo "<p style='font-size:20px;text-align:center;'>Field Empty. Please enter Website Address.
	    </p>";
	  }
else if ($matches){

	foreach ($matches as $val) {
		echo "<table width='80%'><tr>\n";
    echo "<td width='50%'><h4>Image: </h4> <br>" . $val[0] . "<br></td>\n";
    echo "<td><h4>Image source: </h4> " . $val[1] . "</td></tr></table><hr><br><br>\n";


}}
else{
	echo "<p style='font-size:20px;text-align:center;'>Invalid Input. We cannot find your Website Address.
	</p>";
}
}


?><hr>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>
