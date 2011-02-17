<div class="wrap">

	<div id="icon-tools" class="icon32"></div>
	<h2>
		Option Editor
	</h2>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<input type="hidden" name="step" value="2" />
		<input type="hidden" name="option_name" value="<?php echo esc_html($_POST['option_name']); ?>" />
		<table class="form-table">
			<tr>
				<th scope="row">Value</th>
				<td>
					<table class="form-table" id="values">
						<?php if ( is_array($optionValue) ){ 
							$i = 0;
							foreach ($optionValue as $key => $value){
							?>
							<tr>
								<td><input type="text" name="key[<?php echo $i; ?>]" value="<?php echo $key; ?>" /></td>
								<td><input type="text" name="value[<?php echo $i;?>]" value="<?php echo $value; ?>" /></td>
							</tr>
						<?php
								$i++;
							} 
						 } else { ?>
						 	<tr>
						 		<td><input type="text" name="value" value="<?php echo $optionValue; ?>" /></td>
						 		<td><select name="type">
					 					<option value="string">String</option>
						 				<option value="boolean">Boolean</option>
						 				<option value="integer">Integer</option>						 				
						 			</select>
						 	</tr>
						 <?php } ?>
					</table>
				</td>
		</table>
		<?php if ( is_array($optionValue) ){ ?>		
			<p><a href="#" class="button-secondary" title="Add New Row" id="add_row">Add New Row</a></p>			
		<?php } ?>
		<p class="submit">
			<input class="button-primary" type="submit" value="Save" id="submitbutton" />
		</p>
	
	</form>
</div>