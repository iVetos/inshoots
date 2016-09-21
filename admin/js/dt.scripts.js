/**
 * Data table scripts
 */

$(function(){
    // datatables
	$('.datatable').dataTable({
	   "oLanguage": {
			"sUrl": "js/dt_en.txt"
		},
		"aaSorting": [],
        "bStateSave": false
	});
    
    // Pages
    $('.dt_pages').dataTable({
		"oLanguage": {
			"sUrl": "js/dt_en.txt"
		},
		"aaSorting": [[ 0, "asc" ]],
        "bStateSave": false,
        "aoColumns": [ 
          null,
          null,
          null,
          { "bSortable": false }
        ]
	});
    
    // Menu
    $('.dt_menu').dataTable({
		"oLanguage": {
			"sUrl": "js/dt_en.txt"
		},
		"aaSorting": [[ 4, "asc" ]],
        "bStateSave": false,
        "aoColumns": [ 
          null,
          null,
          null,
          null,
          { "bSortable": false }
        ]
	});

    // Canvas
    $('.dt_canvas').dataTable({
        "oLanguage": {
            "sUrl": "js/dt_en.txt"
        },
        "aaSorting": [[ 4, "asc" ]],
        "bStateSave": false,
        "aoColumns": [
            null,
            { "bSortable": false },
            null,
            null,
            { "bSortable": false }
        ]
    });

    // Products
    $('.dt_products').dataTable({
        "oLanguage": {
            "sUrl": "js/dt_en.txt"
        },
        "aaSorting": [[ 4, "asc" ]],
        "bStateSave": false,
        "aoColumns": [
            null,
            { "bSortable": false },
            null,
            null,
            null,
            { "bSortable": false }
        ]
    });

    // Gallery
    $('.dt_gallery').dataTable({
		"oLanguage": {
			"sUrl": "js/dt_en.txt"
		},
		"aaSorting": [[ 0, "asc" ]],
        "bStateSave": false,
        "aoColumns": [ 
          null,
          null,
          null,
          { "bSortable": false }
        ]
	});
    
    // Dt admins
    $('.dt_admins').dataTable({
		"oLanguage": {
			"sUrl": "js/dt_en.txt"
		},
		"aaSorting": [[ 1, "asc" ]],
        "bStateSave": false,
        "aoColumns": [ 
          null,
          null,
          null,
          null,
          { "bSortable": false }
        ]
	});
    
    // Dt users
    $('.dt_users').dataTable({
		"oLanguage": {
			"sUrl": "js/dt_en.txt"
		},
		"aaSorting": [[ 1, "asc" ]],
        "bStateSave": false,
        "aoColumns": [ 
          null,
          null,
          { "bSortable": false },
          null,
          { "bSortable": false },
          { "bSortable": false },
          { "bSortable": false }
        ]
	}); 
    
    // Dt three cols
    $('.dt_three').dataTable({
		"oLanguage": {
			"sUrl": "js/dt_en.txt"
		},
		"aaSorting": [[ 0, "asc" ]],
        "bStateSave": false,
        "aoColumns": [ 
          null,
          null,
          { "bSortable": false }
        ]
	}); 
});