<?php

$baseUrl = "./";

include $baseUrl . "assets/templates/home/header.inc.php";

?>

<div class="py-4 d-flex">
	<video class="w-100 rounded shadow-sm" autoplay muted loop>
		<source src="<?= $baseUrl ?>assets/videos/paluto.mp4" type="video/mp4">
		Your browser does not support the video tag.
	</video>
</div>

<div class="container__md py-4" id="about">
	<h2 class="mb-4 text-dark">About</h2>

	<div class="bg-white p-4 rounded shadow-sm">
		<h4 class="font-weight-bold">WHAT IS PALUTO?</h4>

		<p><strong>PALUTO</strong> is an online food delivery service System and a mobile application that caters to one of the parts of the Culinary Capital of the Philippines—Angeles City, Pampanga! We want to bring the delectable dishes of Angeles City to you, and indeed, customers may request online what they want to crave for in a hassle-free way.</p>

		<p>We are aiming to provide a quality service for customers who are most likely to request dishes in a particular meal based on what they are craving for and custom-made foods. as well as to address the small and local businesses, especially in Angeles City, who are still new to this food industry. Through our website and mobile application, we can help them boost the sales of each small and local business partner. Through PALUTO, more customers are within their reach!</p>

		<hr>

		<h5 class="font-weight-bold">HOW DOES PALUTO WORK? PALUTO works in 4 simple steps:</h5>

		<p class="ml-3"><strong>Step 1:</strong> Select your meal from our list of specific local and small businesses; if you have any special requests for your meal, please address them here.</p>
	 
		<p class="ml-3"><strong>Step 2:</strong> The system will notify you about the status of your orders.</p>
		<p class="ml-3"><strong>Step 3:</strong> Make a cash-on-delivery payment.</p>
		<p class="ml-3"><strong>Step 4:</strong> Wait about 60 minutes, then enjoy your meal!</p>
	</div>
</div>

<div class="text-center py-4">
	Paluto &copy; <?= date('Y'); ?>. All Rights Reserved.
</div>

<?php

include $baseUrl . "assets/templates/home/footer.inc.php";

?>
