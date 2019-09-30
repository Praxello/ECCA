<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
     include "connection.php";
	 mysqli_set_charset($conn,'utf8');
	 $response=null;
	$records= null;
     extract($_POST);
                    $sql_1 = "SELECT * FROM package_master WHERE isActive=1 ORDER BY sequenceno";
		 			$academicQuery = mysqli_query($conn,$sql_1);
						if($academicQuery!=null)
						{
							$academicAffected=mysqli_num_rows($academicQuery);
							if($academicAffected > 0)
							{
								while($academicResults = mysqli_fetch_assoc($academicQuery))
									{
										$tempPackageDetails = $academicResults;


										$tempPackageId = $academicResults['packageId'];

										$tempOrderItems = null;
										$tempServiceDetails = null;

									    $sql_2 = "SELECT * FROM package_details_master PD INNER JOIN service_master SM ON SM.serviceId = PD.serviceId INNER JOIN service_category_master SC ON SM.categoryId = SC.categoryId WHERE PD.packageId =$tempPackageId";
										$QueryPackageItem = mysqli_query($conn,$sql_2);
										$academicAffected1=mysqli_num_rows($QueryPackageItem);
										if($academicAffected1>0)
										{
											while($OrderPackageResult = mysqli_fetch_assoc($QueryPackageItem))
											{
											$tempServiceDetails[] = $OrderPackageResult;
                                            }
											$tempOrderItems = $tempServiceDetails;

										}
										$tempDateDetails = null;
										$tempOrderDates = null;
										$sql_3 = "SELECT * FROM Package_months_mapping PM INNER JOIN MonthsMaster MM ON MM.MonthId = PM.MonthId WHERE PM.PackageId = $tempPackageId ORDER BY MM.Months ";
										$QueryPackageDate = mysqli_query($conn,$sql_3);
										$academicAffected2=mysqli_num_rows($QueryPackageDate);
										if($academicAffected2>0)
										{
											while($OrderPackageDate = mysqli_fetch_assoc($QueryPackageDate))
											{
											$tempDateDetails[] = $OrderPackageDate;
                                            }
											$tempOrderDates = $tempDateDetails;

										}
										$tempOfferDetails = null;
										$tempOffers = null;
										$sql_4 = "SELECT * FROM DiscountMaster DM INNER JOIN MonthsMaster MM ON DM.MonthId = MM.MonthId WHERE DM.PackageId = $tempPackageId ORDER BY MM.Months DESC";
										$QueryOffer = mysqli_query($conn,$sql_4);
										$academicAffected3=mysqli_num_rows($QueryOffer);
										if($academicAffected3>0)
										{
											while($OrderOffer = mysqli_fetch_assoc($QueryOffer))
											{
												$tempOfferDetails[] = $OrderOffer;
                                            }
											$tempOffers = $tempOfferDetails;

                                        }

									$a = array('PackageDetails'=>$tempOrderItems);
									$b = array('DateDetails'=>$tempOrderDates);
									$c = array('Offers' => $tempOffers);
									$records[] = array_merge($tempPackageDetails,$a,$b,$c);

									}
							$response = array('Message'=>"All data fetched successfully".mysqli_error($conn),"Data"=>$records,'Responsecode'=>200);
							}
							else
							{
									$response = array('Message'=>"No data availalbe".mysqli_error($conn),"Data"=> $records,'Responsecode'=>403);
							}
						}
						else{
									$response = array('Message'=>"No data availalbe".mysqli_error($conn),"Data"=> $records,'Responsecode'=>403);
							}

	 print json_encode($response);
?>
