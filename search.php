<?
    require_once("cb.php");
?>
<html>
<head>
	<title>JobJumbler</title>
	<link rel='stylesheet' type='text/css' href='searchstyle.css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
		$(document).ready(function(){			
			$("#arrow_right_container")
			.mouseenter(function(event){
				$("#arrow_right").animate({'left' : '90px'});
				})
			.mouseleave(function(event){
				$("#arrow_right").animate({'left' : '190px'});
			});
			$("#arrow_left_container")
			.mouseenter(function(event){
				$("#arrow_left").animate({'left' : '0px'});
				})
			.mouseleave(function(event){
				$("#arrow_left").animate({'left' : '-100px'});
			});
			$('#start_over').click(function() {
   				document.location.href='http://localhost/';
			});
            $('#apply').click(function() {
                $("#content_frame").css("visibility", "visible");
                $("#return").css("visibility", "visible");
                $("#desc_frame").css("visibility", "hidden");
            });
                          
            $('#return').click(function() {
                $("#content_frame").css("visibility", "hidden");
                $("#return").css("visibility", "hidden");
                $("#desc_frame").css("visibility", "visible");
            });
            $('#logo').click(function() {
                document.location.href='http://localhost/';
            });
		});
	</script>
</head>


<body>

	<div id='nav_wrapper'>
		<img src='images/logo.png' id='logo'>
		<div id='apply'>Apply!</div>
		<div id='start_over'>Start Over</div>
	</div>

	<div id='arrow_left_container'>
		<img src='images/arrow_left.png' id='arrow_left'>
	</div>

	<div id='arrow_right_container'>
		<img src='images/arrow_right.png' id='arrow_right'>
	</div>

	<div id='content_wrapper'>
		<?
			$results = CBAPI::getJobResults($_GET["job_query"], $_GET["city_query"], "", 0); //array of 1 job
			$job = CBAPI::getJobDetails($results[0]->did); //job 
			$apply_link = $job->applyURL; //applyURL from job
			$details_link = $job->companyDetailsURL;
            $description = $job->getJobDescription(); //description from job

		?>
		<iframe src="<?php echo $apply_link; ?>" id="content_frame" frameBorder="0"></iframe>

        <div id='desc_frame'>
            <? echo html_entity_decode($description, ENT_QUOTES); ?>
        </div>

	</div>

    <div id='return'>
        Return To Posting
    </div>


</body>
</html>