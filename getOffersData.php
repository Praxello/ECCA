<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
     include "connection.php";
	 mysqli_set_charset($conn,'utf8');
	 $response=null;
	 extract($_POST);

           $BikeRecord =null;   
						$academicQuery = mysqli_query($conn,"SELECT * FROM BikeOfferMaster");
						if($academicQuery!=null)
						{
							$academicAffected=mysqli_num_rows($academicQuery);
							if($academicAffected>0)
							{
								while($academicResults = mysqli_fetch_assoc($academicQuery))
									{
										$BikeRecord[]=$academicResults;
									}
							}

						}				
$response = array('Message' => "Data fetched successfully","BikeRecords"=>$BikeRecord, 'Responsecode' => 200);
print json_encode($response);
?>