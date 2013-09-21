<?php 
	require_once 'includes/header.php';
	$result = file($target);
	$total = 0;
?>

		<section id="main">
			<div class="center">
				<a id="add-btn" href="add.php">Add item</a>
				<form id="filter-form" method="GET">
					<select name="filter">
						<?php 
							print_r('<option value="0">All</option>');
							foreach ($groups as $key=>$val) {
								$v = $key + 1;
								print_r('<option value="'.$v.'">'.$val.'</option>');
							}
						?>
					</select>
					<input type="submit" name="submit-filter" value="Filter"/>
				
					<div id="expenses">
						
						<?php 
							print_r('<div class="row"><span class="date">Date</span><span class="name">Name</span><span class="price">Sum</span><span class="type">Type</span><span class="actions">Actions</span></div>');
							if(isset($_GET['filter']) && $_GET['submit-filter'] == 'Filter' && $_GET['filter'] != 0) {
								foreach ($result as $key=>$value) {
									$row = explode('?', $value);
									$filter = $_GET['filter'];
									
									if(trim($row[3]) == (int)$filter - 1) {
										$total += (float)trim($row[2]);
										print_r('<div class="row"><span class="date">'.$row[0].'</span><span class="name">'.$row[1].'</span><span class="price">'.$row[2].'</span><span class="type">'.$groups[trim($row[3])].'</span><span class="edit"><a href="add.php?edit=true">Edit</a></span><span class="delete"><a href="#">Delete</a></span></div>');
									}
								}
							print_r('<div class="row"><span class="name" style="margin-left: 108px; background: transparent; color: #0088cc;">Total: </span><span class="price" style="background: #0088cc;">'.$total.' BGN</span></div>');
							}
							else {
								foreach ($result as $key=>$value) {
									$row = explode('?', $value);
									$total += (float)trim($row[2]);
									print_r('<div class="row"><span class="date">'.$row[0].'</span><span class="name">'.$row[1].'</span><span class="price">'.$row[2].'</span><span class="type">'.$groups[trim($row[3])].'</span><span class="edit"><a href="add.php?edit=true">Edit</a></span><span class="delete"><a href="#">Delete</a></span></div>');
									
								}
								print_r('<div class="row"><span class="name" style="margin-left: 108px; background: transparent; color: #0088cc;">Total: </span><span class="price" style="background: #0088cc;">'.$total.' BGN</span></div>');
							
							}
						?>
						
					</div>
				</form>
			</div>
		</section>
		
<?php 
	require_once 'includes/footer.php';
?>