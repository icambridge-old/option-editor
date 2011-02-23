<div class="wrap">

	<div id="icon-tools" class="icon32"></div>
	<h2>
		Option Editor
	</h2>

	<?php if (isset($message)) { ?>
	<div class="updated"><?php echo $message; ?></div>
	<?php } ?>
	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<input type="hidden" name="step" value="1" />
		<table class="form-table">
			<tr>
				<th scope="row">Option</th>
				<td>
					<select name="option_name">
						<?php 
							foreach($optionList as $name => $option){
						?>
							<option value="<?php echo $name; ?>"><?php echo $name; ?></option>
						<?php } ?>
					</select>
				</td>
		</table>
		
		<p class="submit">
			<input class="button-primary" type="submit" value="Edit" id="submitbutton" />
		</p>
	
	</form>
