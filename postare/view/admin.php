<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="view/css/normalsize/navbar.css">
	<link rel="stylesheet" href="view/css/normalsize/footer.css">
	<link rel="stylesheet" href="view/css/normalsize/admin.css">
	<link rel="stylesheet" href="view/css/responsive/adminR.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Log page</title>
</head>
<body>
	

	<header class="topnav" id="myTopnav">
		<a class="active" href="./home.html">Home</a>
		<a href="./feedbacks.html">Sfatuitori</a>
		<a href="https://github.com/AzdHyperman/WebProject">About</a>
		<a href="#page_footer">Contact</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a>
		<div class="Username">
			<button class="userbox" onclick="userMenu()">
			<img class="avatar" alt="Profile" src="view/imagini/<?php echo $avatar;?>"></button>
				<label href="#"><?php echo $username; ?></label> 
				<div class="dropdown-content">
					<a href="index.php?action=profile">Profile</a>
					<a href="index.php?action=logpage">Admin</a>
					<a href="#">DarkMode?</a>
					<a href="index.php?action=logout">Logout</a>
				</div>
		</div>
	</header>
    <h1 >Activitate Site</h1>
	<form action="" method="POST" enctype="multipart/form-data">
	<div class="ActivityLog">
		<p>activitate 1 </p>
		<p>activitate 2</p>
		<p>activitate 3</p>
		<p>activitate 4</p>
		<p>activitate 5</p>
	<?php if(!empty($result)) 
	{foreach($result as $k =>$v)
	{
	?>
	<div class="ActivityLog-elements"><?php echo "Type: ".$result[$k]["type"]." Info: :".$result[$k]["info"]?></div>
	<?php	
	}
	}
	?>
        
        
        <!-- <div class="ActivityLog-elements">Type:Postare A fost dat un rasuns de Sfatuitor-ul Spoitorul</div>
        <div class="ActivityLog-elements">Type:Login User-ul s-a logat la 10.12.2021 23:59</div>
        <div class="ActivityLog-elements">Type:Login User-ul s-a logat la 10.12.2021 23:59</div> -->
        <Button name="pdf">save as pdf</Button>
        <Button name="csv">save as csv</Button>
        <Button>save as png</Button>
        <button name="print">Print</button>
    </div>
	</form>
</body>
</html>
<?php	
 
use Dompdf\Dompdf;
if(isset($_POST["pdf"])){
	ob_start();
	echo "buna";
	// include autoloader
	require_once 'util/dompdf/autoload.inc.php';
	// reference the Dompdf namespace

	// instantiate and use the dompdf class
	$dompdf = new Dompdf();
	$dompdf->loadHtml(ob_get_clean());

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4', 'landscape');

	// Render the HTML as PDF
	//ob_get_clean();
	$dompdf->render();

	// Output the generated PDF to Browser
	$dompdf->stream('activity');
	exit();
}
//csv
	if(isset($_POST["csv"])){
		ob_start();
		
		header('Content-Disposition: attachment; filename="sample.csv"');
		// exit();
$data = array(
        'aaa,bbb,ccc,dddd',
        '123,456,789',
        '"aaa","bbb"'
);

$fp = fopen('php://output', 'wb');
foreach ( $data as $line ) {
    $val = explode(",", $line);
    fputcsv($fp, $val);
}
fclose($fp);
	}

	if(isset($_POST["print"])){
		echo '
		<button onclick="window.print()">Print this page</button>';
	}
?>