


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/css/perfect-scrollbar.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<?php 
	if(isset($_GET['deletecourse']))
	{
		require_once'db.php';
		$idcourse = $_GET['deletecourse'];
		$sql ="DELETE FROM course WHERE idcourse ='". (int)$idcourse ."'";
		$result = $conn-> query($sql);
		Header( "Location: modifyCourse.php" );
	}
	?>  
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">ID Course</th>
								<th class="column2">Course's Name</th>
								<th class="column3">Course's Description</th>
								<th class="column4">Topic</th>
								<th class="column5">Update</th>
								<th class="column6">Delete</th>
								
							</tr>
						</thead>
						<tbody>
							<?php 
							require_once'db.php';

							$sql = "SELECT * FROM course ";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
							    // output data of each row
								while($row = $result->fetch_assoc()) {
									$_SESSION['idcourse'] = $row['idcourse'];
									$idcourse = $_SESSION['idcourse'];
									?>
									<tr>
										<td class="column1"><?php echo $row["idcourse"]?></td>
										<td class="column2"><?php echo $row["name"]?></td>
										<td class="column3"><?php echo $row["description"]?></td>
										<td class="column4">

											<?php 
											require_once'db.php';

											$sql1 = "SELECT topic.name FROM topic INNER JOIN course ON topic.idcourse=course.idcourse where course.idcourse =".$idcourse;

											$result1 = $conn->query($sql1);
											if ($result1->num_rows > 0) {
							    // output data of each row
												while($row1 = $result1->fetch_assoc()) {
													?>
													<span><?php echo $row1["name"]?></span>

													<?php
												}
											}
											?>


										</td>
										<td class="column5"><a href="https://youtu.be/2WRN7_jj9bI"><button type="button" class="btn btn-default" >Update</button></a></td>
										<td class="column6">
											<a class="btn btn-default" href="modifyCourse.php?deletecourse=<?php echo $row["idcourse"]?>">
  											<i class="fa fa-trash-o fa-lg"></i> Delete</a>
											
										</td>

									</tr>

									<?php
								}
							}
							?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


</body>
</html>
