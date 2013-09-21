<?php 
	session_start();
	require_once 'includes/header.php';
?>
	
		<div id="add-item">
			<div class="item-heading">
				<hgroup>
					<h1>Add item:</h1>
					<h4>Point out the details that describe the item you want to add:</h4>
				</hgroup>
				</div>
				<div class="item-content">
				<form id="add-form" name="add-item-form" method="POST">
				<div id="fields">
					<label for="name" class="block">
						<span class="pref">Name: </span>
						<input type="text" name="item-name" />
					</label>
					<label for="sum" class="block">
						<span class="pref">Sum: </span>
						<input type="text" name="item-sum" />
					</label>
					<label for="type" class="block">
						<span class="pref">Type: </span>
						<select id="types" name="item-type">
						<?php
						foreach($groups as $key=>$value) {
							echo '<option value="'.$key.'">'.$value.'</option>';
						}
						?>
						</select>
					</label>
				</div>
			<?php 
				//Getting the data from the form.
				if(!empty($_POST)) {
					$nameInit = trim($_POST['item-name']);
					$name = str_replace('?', '', $nameInit);
					$sum = $_POST['item-sum'];
					$type = $_POST['item-type'];
				
					//Validating the data.
					$allValid = validate($name, $sum);
			
					//Inserting the data in the file.
					if($allValid) {
						put_expenses($name, $sum, $type, $target);
						header('location: /Expenses/add.php'); // same file
						exit;
					}
					else {
						echo '<p style="color: red; font-size: 18px; margin: 0; padding: 2px 0; font-family: calibri;">Invalid details</p>';
					}
				}
			?>
			<div class="buttons">
				<input id="add" type="submit" name="submit" value="Add" />
				<input id="add-new" type="button" value="Add new" />
				<a id="cancel-btn" href="index.php">Back to list</a>
			</div>
		</form>
	</div>
</div>

<?php 
	require_once 'includes/footer.php';
?>