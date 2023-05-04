// This file exports data in either excel,csv,pdf with the title as user has indicated
//Script begins here
var buttonCommon = {
   init: function (dt, node, config) {
     var table = dt.table().context[0].nTable;
     if (table) config.title = $(table).data('export-title')
   },
   title: 'default title'
 };
 $.extend( $.fn.dataTable.defaults, {
     "buttons": [
        
         $.extend( true, {}, buttonCommon, {
             extend: 'pdfHtml5',
             orientation: 'landscape',
             exportOptions: {
                 columns: ':visible'
             }
         } ),
         {  
            extend: 'copy'
         },
        ,
        $.extend( true, {}, buttonCommon, {
            extend: 'csv',
         }),
         $.extend( true, {}, buttonCommon, {
            extend: 'excelHtml5',
            exportOptions: {
                columns: ':visible'
            }
        } ),
     ]
 } );
 
 $('#myTable').DataTable( {
   dom: 'Bfrtip',
 });

//Scripts ends here 


// In the table add this part
<table class="table table-bordered" id="myTable" width="100%" cellspacing="0" data-export-title="write the name of the file as you want it downloaded in your pc">
