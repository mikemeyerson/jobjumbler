<?php 
    require_once("cb.php");

	$job = $_GET["job"];
	$city = $_GET["city"];
	$id = $_GET["id"];



	$results = CBAPI::getJobResults($job, $city, "", $id, 0);
	$res = CBAPI::getJobDetails($results[0]->did); //job 
	$temp=$res->applyURL;
?>

<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<script type='text/javascript'>
	var php_link = "<?php echo $temp; ?>";
	$('#content_frame').attr("src", php_link);
</script>";

