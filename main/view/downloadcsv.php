<?php	
//csv 
    include_once '../controller/DBController.php';
    $dbCSV = new DBController();
	    //if(isset($_POST["csv"]))
	    {
			header("Content-Type: text/csv");
			header("Content-Disposition: attachment; filename=file.csv");
			# Disable caching - HTTP 1.1
			header("Cache-Control: no-cache, no-store, must-revalidate");
			# Disable caching - HTTP 1.0
			header("Pragma: no-cache");
			# Disable caching - Proxies
			header("Expires: 0");
			
			$query="SELECT * FROM logpage";
            $result = mysqli_query($dbCSV->connectDB(), $query);

			//ob_end_clean();

		    $output = fopen('php://output', 'w');
            fputcsv($output,array('Log_Id','Type','Informatii','Data'));
             
            while($row = mysqli_fetch_assoc($result))  
            {  
                fputcsv($output, $row);  
            }  
			exit;
	    }
//endCSV
?>