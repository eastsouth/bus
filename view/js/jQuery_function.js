jQuery(document).ready(function(){
    jQuery( "#startStationID" ).autocomplete({
        source: function(request, response ) {
            jQuery.ajax({
                url: "index.php?c=multipoint&a=getJson",
                type:"GET",
                dataType: "json",
                data:{
                    searchForJson: request.term
                },
                success: function( data ) {
                    response( jQuery.map( data, function( item ) {
                        return {
                            label:item.station_name,
                            value: item.labelview
                        }
                    }));
                }
            });
        }
    });
    
    jQuery( "#endStationsID" ).autocomplete({
        minLength: 1,
        source: function(request, response ) {
            jQuery.ajax({
                url: "index.php?c=multipoint&a=getJson",
                type:"GET",
                dataType: "json",
                data:{
                    searchForJson: request.term
                },
                success: function( data ) {
                    response( jQuery.map( data, function( item ) {
                        return {
                            label:item.station_name,
                            value: item.labelview
                        }
                    }));
                }
            });
        }
    });
});