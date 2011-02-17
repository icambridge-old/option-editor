jQuery(document).ready( function(){

	// Start add new row
	jQuery('#add_row').click( function(){

		var rowCount = jQuery('#values tr').length;
		rowCount++;
		// New row HTML
		var html = '';		
		html += '<tr>';
		html += '<td><input type="text" name="key['+rowCount+']" value="" /></td>';
		html += '<td><input type="text" name="value['+rowCount+']" value="" /></td>';
		html += '</tr>';
		
		jQuery('#values tr:last').after(html);
		return false;
	});
	// End add new row

	
});