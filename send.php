<head>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<?php  


function displayToastAndRedirect($message, $url) {
	// Display a toast message using the toastr library
	echo "<script>$(document).ready(function(){toastr.success('{$message}', '', { 'positionClass': 'toast-top-center', 'closeButton': true, 'progressBar': true, 'timeOut': 3000, 'extendedTimeOut': 1000, 'showEasing': 'swing', 'hideEasing': 'linear', 'showMethod': 'slideDown', 'hideMethod': 'slideUp', 'tapToDismiss': true, 'preventDuplicates': true, 'onclick': null, 'onCloseClick': null, 'onShown': null, 'onHidden': null, 'rtl': false, 'fadeOut': 250, 'fadeIn': 250, 'closeMethod': false, 'closeDuration': false, 'closeEasing': false, 'closeOnHover': true, 'iconClass': false, 'iconType': 'class', 'target': 'body', 'closeHtml': '<button><i class=\"fa fa-times\"></i></button>', 'toastClass': 'toast-lg' })});</script>";
  
	// Redirect the user back to the index.php page
	header("refresh:1.5; url={$url}");
	}  
	function displayToastRedirect($message, $url) {
		// Display a toast message using the toastr library
		echo "<script>$(document).ready(function(){toastr.error('{$message}', '', { 'positionClass': 'toast-top-center', 'closeButton': true, 'progressBar': true, 'timeOut': 3000, 'extendedTimeOut': 1000, 'showEasing': 'swing', 'hideEasing': 'linear', 'showMethod': 'slideDown', 'hideMethod': 'slideUp', 'tapToDismiss': true, 'preventDuplicates': true, 'onclick': null, 'onCloseClick': null, 'onShown': null, 'onHidden': null, 'rtl': false, 'fadeOut': 250, 'fadeIn': 250, 'closeMethod': false, 'closeDuration': false, 'closeEasing': false, 'closeOnHover': true, 'iconClass': false, 'iconType': 'class', 'target': 'body', 'closeHtml': '<button><i class=\"fa fa-times\"></i></button>', 'toastClass': 'toast-lg' })});</script>";
	  
		// Redirect the user back to the index.php page
		header("refresh:3; url={$url}");
		}  



if (isset($_POST['name']) && isset($_POST['message']) && isset($_POST['email']) && isset($_POST['contactnum'])) {
	include 'db_conn.php';

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$name = validate($_POST['name']);
	$message = validate($_POST['message']);
    $email = validate($_POST['email']);
    $contactnum = validate($_POST['contactnum']);


	if (empty($message) || empty($name) || empty($email) || empty($contactnum)) {
		header("Location: index.php");
	}else {

		$sql = "INSERT INTO contact(name, email, pnum, msg) VALUES('$name', '$email', '$contactnum', '$message')";
		$res = mysqli_query($conn, $sql);

		if ($res) {
			displayToastAndRedirect("Message sent successfully!", "index.php");
			
		}else {
			displayToastRedirect("Failed: Try Again!", "#contact");

		}
	}

}else {
	header("Location: index.php");
}