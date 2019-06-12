$(document).ready(function(){

  //$('#search input[name="filter_name"]').attr("x-webkit-speech", "x-webkit-speech")
	$('#search input[name="searchz"]').autocomplete({
    source: function( request, response ) {
     	console.log(request);
         console.log(response);
				$.ajax({
					url: 'index.php?route=product/search_json',
					dataType: 'json',
					data: {
						keyword: request.term
					},
					success: function( json ) {
						console.log(json);
						response( $.map( json, function( item ) {
							return {
								// label: item.name,
                // price: item.price,
                // special: item.special,
                // value: item.href,
                // img: item.thumb,
                // description: item.description,
                // attributes: item.attributes
							}
						}));
					}
				});
			},
			minLength: 1,
			select: function( event, ui ) {
        if(ui.item.value == ""){
          return false;
        }else{
          location.href=ui.item.value;
          return false;
        }
			},
			open: function() {
				$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );

            },
			close: function() {
				$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
			},
			focus: function( event, ui ) {
				$('#search input[name="filter_name"]').val( ui.item.label );
				return false;
			}
  }).data('ui-autocomplete')._renderItem = function( ul, item ) {
    // var product_img = item.img ? '<img src="' + item.img + '">' : '';
    // var product_price = item.special ? '<span class="price-old">' + item.price + '</span><span class="price-new">' + item.special + '</span>' : item.price;
    // var description = item.description ? '<div class="description">' + item.description + '</div>' : '';
    // var attributes  = item.attributes  ? '<div class="attributes">'  + item.attributes  + '</div>' : '';
    return $( "<li></li>" )
      .data( "item.autocomplete", item )
      .append( '<a class="product-list"><div class="image">' + product_img + '</div><div class="name">' + item.label + '</div><div class="price">' + product_price + '</div>' + description + attributes + '</a>' )
      .appendTo( ul );
  };			
});
