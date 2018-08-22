//PIPELINED DÙNG ĐỂ CACHE TRANG, HẠN CHẾ GỌI AJAX ĐẾN SERVER
$.fn.dataTable.pipeline = function ( opts ) {
    // Configuration options
    var conf = $.extend( {
        pages: 5,     // number of pages to cache
        url: '',      // script url
        data: null,   // function or object with parameters to send to the server
                      // matching how `ajax.data` works in DataTables
        method: 'GET' // Ajax HTTP method
    }, opts );
 
    // Private variables for storing the cache
    var cacheLower = -1;
    var cacheUpper = null;
    var cacheLastRequest = null;
    var cacheLastJson = null;
 
    return function ( request, drawCallback, settings ) {
        var ajax          = false;
        var requestStart  = request.start;
        var drawStart     = request.start;
        var requestLength = request.length;
        var requestEnd    = requestStart + requestLength;
         
        if ( settings.clearCache ) {
            // API requested that the cache be cleared
            ajax = true;
            settings.clearCache = false;
        }
        else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
            // outside cached data - need to make a request
            ajax = true;
        }
        else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
                  JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
                  JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
        ) {
            // properties changed (ordering, columns, searching)
            ajax = true;
        }
         
        // Store the request for checking next time around
        cacheLastRequest = $.extend( true, {}, request );
 
        if ( ajax ) {
            // Need data from the server
            if ( requestStart < cacheLower ) {
                requestStart = requestStart - (requestLength*(conf.pages-1));
 
                if ( requestStart < 0 ) {
                    requestStart = 0;
                }
            }
             
            cacheLower = requestStart;
            cacheUpper = requestStart + (requestLength * conf.pages);
 
            request.start = requestStart;
            request.length = requestLength*conf.pages;
 
            // Provide the same `data` options as DataTables.
            if ( typeof conf.data === 'function' ) {
                // As a function it is executed with the data object as an arg
                // for manipulation. If an object is returned, it is used as the
                // data object to submit
                var d = conf.data( request );
                if ( d ) {
                    $.extend( request, d );
                }
            }
            else if ( $.isPlainObject( conf.data ) ) {
                // As an object, the data given extends the default
                $.extend( request, conf.data );
            }
 
            settings.jqXHR = $.ajax( {
                "type":     conf.method,
                "url":      conf.url,
                "data":     request,
                "dataType": "json",
                "cache":    false,
                "success":  function ( json ) {
                    cacheLastJson = $.extend(true, {}, json);
 
                    if ( cacheLower != drawStart ) {
                        json.data.splice( 0, drawStart-cacheLower );
                    }
                    if ( requestLength >= -1 ) {
                        json.data.splice( requestLength, json.data.length );
                    }
                     
                    drawCallback( json );
                }
            } );
        }
        else {
            json = $.extend( true, {}, cacheLastJson );
            json.draw = request.draw; // Update the echo for each response
            json.data.splice( 0, requestStart-cacheLower );
            json.data.splice( requestLength, json.data.length );
 
            drawCallback(json);
        }
    }
};
 
// Register an API method that will empty the pipelined data, forcing an Ajax
// fetch on the next draw (i.e. `table.clearPipeline().draw()`)
$.fn.dataTable.Api.register( 'clearPipeline()', function () {
    return this.iterator( 'table', function ( settings ) {
        settings.clearCache = true;
    } );
} );
var temp = $('#id_dept').attr('data-dept');
var id_dept = temp.split(','); 

var dataTable = $('#tabledata').DataTable( {
		bSortCellsTop: true,
		processing: true,
		serverSide: true,
		rowCallback: function( row, data, index ) {
			var mamau = '#000';
			if(data.trangthai != 'Hoạt động'){
				mamau = '#CCC';
	        }
			if(data.trangthai == 'Mới tiếp nhận'){
				mamau = '#F39';
	        }
	        $(row).css('color', mamau);
		},
		ajax:$.fn.dataTable.pipeline({
			url :"./qltbv2/datatable.php", // json datasource,
			data: {                       
                id_dept: id_dept
            },
			pages: 5, // number of pages to cache
			//type: "get",  // method  , by default get
			error: function(){  // error handling
				//$(".employee-grid-error").html("");
				$("#khachhang-phieu").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				//$("#employee-grid_processing").css("display","none");
				
			},
		}),
		columns: [
                { data: "id_dept" },
                { data: "nhome_id"},
                { data: "code_tb"},
                { data: "name_vi" },
                { data: "model" },
                {data: "id_tb_v1"},
                { data: "trangthai" },
                { data: "id_tb" }
            ],
            stateSave: true,
            responsive: {
	            details: {
	                renderer: function ( api, rowIdx, columns ) {
	                    var data = $.map( columns, function ( col, i ) {
	                        return col.hidden ?
	                            '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
	                                '<td style="font-weight: bold;">'+col.title+':'+'</td> '+
	                                '<td>'+col.data+'</td>'+
	                            '</tr>' :
	                            '';
	                    } ).join('');
	 
	                    return data ?
	                        $('<table/>').append( data ) :
	                        false;
	                }
	            }
	        },
            columnDefs: [
	            {
	                render: function ( data, type, row ) {
	                    return data + row.bhk_id;
	                },
	                targets: 1
	            },
	            /*{
	                render: function ( data, type, row ) {
	                	if(data == 'Hoạt động'){
	                		console.log(data)
	                		return '<span style="color:#090;">'+data+'</span>';
	                	}
	                	if(){
	                		return '<span style="color:#F00;">'+data+'</span>'
	                	}
	                    return data;
	                },
	                targets: 6
	            },*/
	            {
	                render: function ( data, type, row ) {
	                	var str = '<a class="btn btn-xs  btn-info" href="./?op=83&amp;id_tb='+data;
	                		str += '"onclick="return nxt_list_additem(this); onmouseover="$(this).tooltip()" " data-toggle="tooltip" title="" data-original-title="Nhật ký thiết bị"><i class="fa fa-info-circle"></i></a>&nbsp;';
	                		if(row.trangthai == 'Hoạt động' || row.trangthai == 'Mới tiếp nhận'){
	                			str += '<a class="btn btn-xs  btn-primary" data-toggle="tooltip" href="./?op=69&amp;edit=1&amp;id_tb='+data;
		                		str += '&amp;KT_back=1" title="" data-original-title="Cập nhật đặc trưng kỹ thuật"><i class="fa fa-pencil"></i></a>&nbsp;';
		                		str += '<a class="btn btn-xs  btn-warning" href="./?op=81&amp;id_tb='+data;
		                		str += '&amp;KT_back=1" onclick="return nxt_list_additem(this)" data-toggle="tooltip" title="" data-original-title="Kiểm tra thiết bị"><i class="fa fa-wrench"></i></a>';
	                		}
	                		
	                    return str;
	                },
	                targets: 7
	            },
		        { responsivePriority: 1, targets: 3 },
				{ responsivePriority: 2, targets: -1 }
	        ],
	        //dom: '<"toolbar">frtip'
	} );

	
 	//$("div.toolbar").html('<a class="btn btn-xs  btn-primary" id="btn_filter" href="#"><i class="fa fa-filter"></i>&nbsp;<i class="fa fa-plus-square-o"></i></a>');
	//$("#employee-grid_filter").css("display","none");  // hiding global search box
	//setup before functions
	var timer;
	var timeout = 1000;
	$('.search-input-text').on( 'keyup click', function () {   // for text boxes
		var i =$(this).attr('data-column');  // getting column index
		var v =$(this).val();  // getting search input value
		dataTable.columns(i).search(v).draw();
		if (window.sessionStorage) {
			sessionStorage.removeItem("search_key");
			var json_str = JSON.stringify({'col': i, 'val':v});
	        sessionStorage.setItem("search_key", json_str);
	    }
		
	} );
	$('.search-input-select').on( 'change', function () {   // for select box
		var i =$(this).attr('data-column');  
		var v =$(this).val();  
		dataTable.columns(i).search(v).draw();
		if (window.sessionStorage) {
			sessionStorage.removeItem("select_key");
			var json_str = JSON.stringify({'col': i, 'val':v});
	        sessionStorage.setItem("select_key", json_str);
	    }
	} );