$(function() {

    $('#leaveApp-table').DataTable({
         'processing': true,
         'serverSide': true,
         'order': [[2 , 'desc' ]],
         'bPaginate': false,
         'bLengthChange': false,
         'bFilter': true,
         'bSort': false,
         'bInfo': false,
         'bAutoWidth': false,
         'ajax':{
     
             "url" : APP_URL + '/leaveApp/data',
             "method":'GET'
         },
         columns: [
             { data: 'full_name', name: 'full_name' },
             { data: 'leavetype', name: 'leavetype' },
             { data: 'id', name: 'id' },
             { data: 'id', name: 'id' },
             { data: 'id', name: 'id' },
             { data: 'id', name: 'id' },
            //  { data: 'created_at', name: 'created_at' },
             { data: 'id', name: 'id' },
         ],
         columnDefs:[
             {
             targets:0 ,
                 orderable : false,
                 searchable: false,
                 render: function (data, type,row){
                     console.log(row.full_name);
                     return row.full_name;
                 }
             },     
             {
                 targets: 2,
                    
                     orderable : false,
                     searchable: true,
                     render:function(data,type,row){
                       var startdate = String(moment(row.startdate).format('D MMM YYYY h:mm'));
                       var enddate = String(moment(row.enddate).format('D MMM YYYY h:mm'));
     
                      
                   
                         var start = new Array(3);
                         var end = new Array(3);
     
                         start = startdate.split(" ");
                         end = enddate.split(" ");
                         
                         if(start[2] == end[2] && start[1] == end[1] &&start[0]==end[0]){
                                 var result = start[0]+' '+start[1]+' '+start[2];
                                 return result;
                         }
                         if(start[2] == end[2] && start[1] == end[1] &&start[0]!=end[0]){
                                 var result = start[0]+ ' - '+ end[0]+' '+start[1]+' '+start[2];
                                 return result;
                         }
                         if(start[2] == end[2] && start[1] != end[1] &&start[0]!=end[0]){
                                 var result = start[0] +' '+ start[1]+ ' - '+ end[0]+' '+end[1]+' '+end[2];
                                 return result;
                         }
                         else{
                                 var result = start[0] +' '+ start[1] +' '+ start[2] +' - '+ end[0]+' '+end[1]+' '+end[2];
                                 return result;
                         }
                     }
             }, 
             {
                 targets: 3,
                     orderable : false,
                     searchable: false,
                     render: function (data, type, row){
                         return row.total;
                     }
             },  
             {
                targets:4,
                orderable : false,
                 searchable: false,
                 render: function (data, type, row){
                     if(row.status == 'APPROVE'){
                         var status = '<button  class="btn btn-success btn-rounded btn-fw">'+ 'APPROVE' +'</button>'
                         return  status;
                        }
                        if (row.status == 'PENDING'){
                            var status = '<button  class="btn btn-warning btn-rounded btn-fw">'+ 'PENDING' +'</button>'
                         return  status;

                     }
                        if (row.status == 'REJECT'){
                            var status = '<button  class="btn btn-danger btn-rounded btn-fw">'+ 'REJECT' +'</button>'
                         return  status;

                     }
                 }

             },
             {
                targets:5 ,
                orderable : false,
                searchable: false,
                render: function (data, type, row){
                    var request = String(moment(row.created_at).format('D MMM YYYY LTS'));

                    return request;
                        
                }
             },
             {
                 targets:6 ,
                 orderable : false,
                 searchable: false,
                 render: function (data, type, row){
                     var view = '<a href="'+APP_URL+'/leaveApp/'+data+'/edit"><button type="button" class="btn btn-success">'+ 'View' +'</button></a>'; 
                    
                     return view;
                 }
             }, 
             
     ]
     });
 
 });
 
 