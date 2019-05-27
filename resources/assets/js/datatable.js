$(document).ready(function () {

    var table = $('#users-table').DataTable({
        'processing': true,
        'serverSide': true,
        'order': [[ 1, 'asc' ]],
        'bPaginate': false,
        'bLengthChange': false,
        'bFilter': true,
        'bSort': false,
        'bInfo': false,
        'bAutoWidth': false,
        'ajax':{
    
            "url" : APP_URL + '/users/data',
            "method":'GET'
        },
        columns: [
           
            // { data: 'id',name:'id' },
            { data: 'username', name: 'username' },
            { data: 'full_name', name: 'full_name' },
            { data: 'nick_name', name: 'nick_name' },
            { data: 'email', name: 'email' },
            { data: 'level', name: 'level' },
            { data: 'id', name: 'id' }
        ],
        
        columnDefs:[
            //      
             {
            targets: 5,
                orderable: false,
                render: function (data, type, row) {
                    if($('#user-current-user-id').attr('data') == data) {
                        var btnEdit = '<a href="'+APP_URL+'/user/'+data+'/edit"><button class="btn btn-success"><i class="fa fa-edit"></i> edit</button></a> ';
                        return btnEdit;
                    }else{
                        var btnEdit = '<a href="'+APP_URL+'/user/'+data+'/edit"><button class="btn btn-success"><i class="fa fa-edit"></i> edit</button></a> ';
                        var btnDelete = '<a href="#" class="btn-delete"  data-username="'+ row.username +'" data-id="'+data+'"><button class="btn btn-light"><i class="fa fa-trash"></i>delete</button></a>';
                        
                        return btnEdit + btnDelete;

                    }
                    
                },
        }]
    });
    $('body').on('click', '.btn-delete', function (e) {
        e.preventDefault();
        var url = APP_URL + '/user/'+ $(this).attr('data-id');
        var name = $(this).attr('data-username');
        var callback = function(){
            App.deleteForm(url, table);
        }

        App.confirmBox('Delete ' + name, callback);
    });
        
  

});

