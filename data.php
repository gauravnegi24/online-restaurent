<?php

include_once('connection.php');

$record_per_page = 10;
$page='';
$output='';

if(isset($_POST["page"])){
	$page=$_POST["page"];
}
else {
	$page = 1;
}

$start_from = ($page-1) * $record_per_page;


$output .= '<div class="row dash-row">
			  <div class="col-lg-12">
				<div class="card spur-card">
					<div class="card-header bg-primary">
						<div class="spur-card-icon">
							<i class="fab fa-buromobelexperte text-light"></i>
						</div>
						<div class="spur-card-title text-light">Available Items</div>
					</div>
					<div class="card-body border border-primary">
						<table class="table table-hover">
							<thead class="thead-dark">
								<tr>
								<th scope="col">#</th>
								<th scope="col">Item</th>
								<th scope="col">Item Unit</th>
								<th scope="col">Item Quantity</th>
								<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>';

			$fatch=mysqli_query($connection,"SELECT * FROM item_table WHERE item_status='available' ORDER BY item_name ASC LIMIT $start_from, $record_per_page");
				$i=1;
				while ($items=mysqli_fetch_array($fatch)){
				$output.='<tr> 
				    	<td>'.$i.'</td>
						<td>'.$items["item_name"].'</td>
						<td>'.$items["item_unit"].'</td>
						<td>'.$items["total_item"].'</td>
						<td><button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#staticModal" onclick="GetDetails('.$items['item_id'].')"><i class="fas fa-edit"></i> Edit</button>&nbsp;
						<button class="btn btn-sm btn-outline-danger" onclick="DeleteItem('.$items['item_id'].')"><i class="fas fa-recycle"></i></i> Trash</button></td>
				      </tr>';
					$i++;	
				}
			$output.='</tbody>
					</table>';

	$page_query="SELECT * FROM item_table WHERE item_status='available' ORDER BY item_name ASC";
	$page_result=mysqli_query($connection, $page_query);
	$total=mysqli_num_rows($page_result);
	$total_pages=ceil($total/$record_per_page);
					
		$output.='<div class="row">
					<div class="col-lg-12">
						<nav class="pagination">
						<hr>
					 		<ul class="pagination">';
							for ($i=1; $i <=$total_pages ; $i++) { 
						$output.='<li class="page-item">
									<a class="page-link" id="'.$i.'">'.$i.'</a>
		   						  </li>';
								}
				  $output.='</ul>
						</nav>
					</div>
				</div>
				</div>
				</div>
			  </div>
			</div>';

	echo $output;

?>
