function jv_qiuckorder_show(product_id) {
	if (product_id > 0) {
		$.ajax({
			url: 'index.php?route=module/jvquickorder/update',
			async: false,
			type: 'post',
			timeout : 5000,
			data: 'product_id=' + product_id,
			dataType: 'json',
			
      beforeSend: function() {
        $('.success, .warning, .attention, information, .error').remove();
        $('#myModal').remove();
      },
      
      success: function(json) {
        
        if (json['error']) {
          var error_message = json['error'];
          alert(error_message);
        }
        
        if (json['output']) {
          if (document.createStyleSheet)
            {
              document.createStyleSheet('catalog/view/javascript/jv_bootstrap/bootstrap-min.css');
            }
          else
            { 
              $("head").append('<link rel="stylesheet" type="text/css" href="catalog/view/javascript/jv_bootstrap/bootstrap-min.css" />'); 
            }
          
          //$("head").after(json['output']);
          $("body").after(json['output']);			
          
          $('#myModal').bt_modal({
            backdrop: true,
            keyboard: true
          });
				}
			}
		});
	}	
}