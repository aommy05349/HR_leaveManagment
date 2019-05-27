var CheckLeave = function () { 
    var $form = $('#checke-form');
    var token = $('meta[name="csrf-token"]').attr('content');
    var handleStatus = function () { 
        var status = $('#status').val();
        console.log(status);
        if(status === 'APPROVE'){
            var result = '<input type="button" class="btn btn-inverse-success btn-rounded btn-fw" value="APPROVE">'
            return  $(".Status").html(result); 
           }
           if (status === 'PENDING'){
            var result = '<input type="button" class="btn btn-inverse-warning btn-rounded btn-fw" value="PENDING">'
            return  $(".Status").html(result); 

        }
           if (status === 'REJECT'){
            var result = '<input type="button" class="btn btn-inverse-danger btn-rounded btn-fw" value="REJECT">'
               return  $(".Status").html(result); 

        }
     }
    var handleRequireOn = function(){
        var requestOn = $('#requestOn').val();
        var request = String(moment(requestOn).format('D MMM YYYY h:mm A'));
        console.log(request);
        return  $(".RequestedOn").html(request); 
    }
    var handleChackDate = function () { 
    var startDate = $('#leaveOn').val();
    var endDate = $('#leaveEnd').val();

 
    var startdate = String(moment(startDate).format('D MMM YYYY h:mm'));
    var enddate = String(moment(endDate).format('D MMM YYYY h:mm'));

      var start = new Array(3);
      var end = new Array(3);

      start = startdate.split(" ");
      end = enddate.split(" ");
      
      if(start[2] == end[2] && start[1] == end[1] &&start[0]==end[0]){
              var result = start[0]+' '+start[1]+' '+start[2];
              console.log(result);
            //   return result;
            return  $(".test01").html(result); 
      }
      if(start[2] == end[2] && start[1] == end[1] &&start[0]!=end[0]){
              var result = start[0]+ ' - '+ end[0]+' '+start[1]+' '+start[2];
              console.log(result);
            return  $(".test01").html(result); 
      }
      if(start[2] == end[2] && start[1] != end[1] &&start[0]!=end[0]){
              var result = start[0] +' '+ start[1]+ ' - '+ end[0]+' '+end[1]+' '+end[2];
              console.log(result);
            return  $(".test01").html(result); 
      }
      else{
              var result = start[0] +' '+ start[1] +' '+ start[2] +' - '+ end[0]+' '+end[1]+' '+end[2];
              console.log(result);
              return  $(".test01").html(result); 
      }
    }
    var handleTatalDate = function(){
        var startDate = $('#leaveOn').val();
        var endDate = $('#leaveEnd').val();

        var startdate = String(moment(startDate).format('D MMM YYYY h:mm'));
        var enddate = String(moment(endDate).format('D MMM YYYY h:mm'));
        
        var starttime = moment(startdate).format('D MMM YYYY HH:mm');
        var endtime = moment(enddate).format('D MMM YYYY HH:mm');

        // console.log(starttime);
        // console.log(endtime);

          var start = new Array(3);
          var end = new Array(3);

          start = startdate.split(" ");
          end = enddate.split(" ");
        //   console.log('***************');
        
            /**
             *  This Check Date Start = Date End ( Leave 1 days)
             */
          if(start[2] == end[2] && start[1] == end[1] &&start[0]==end[0]){
           
            var result = moment(endtime).diff(moment(starttime));
            var asHour = moment.duration(result).as('hour'); 
            console.log(asHour);
                if(asHour <= 4){
                    var haft = 0.5;
                    return $(".total").html(haft);
                }else{
                    var full = 1;
                    return $(".total").html(full);
                }
            }else{

                var startdate = startdate;
                var enddate = enddate;
                var result = moment(enddate).diff(moment(startdate));
                var asDate = moment.duration(result).as('day'); 
                asDate +=1;
                var diffDays = parseInt(asDate);
                return $(".total").html(diffDays);
            }
    }
    var handleApprove = function () { 
        $('#btn-approve-ajax').on('click',function(e){
            // console.log('****************');
            e.preventDefault();
            var user_id = $('#id').val();
            var formData  =  $form.serializeArray();
            var submitURL = APP_URL+'/leaveApp/'+ user_id ;
        
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                });
                $.ajax({
                    type: 'PUT',
                    url: submitURL,
                    data: formData,
                    success: function(resp){
                        App.showBoxSuccess('Approve');
                        window.location = APP_URL + '/leaveApp';
                    },
                    error:function(jqXhr){                                            
                        var errors = jqXhr.responseJSON;
                        if (errors['errors'] !== undefined)
                        {                    
                            App.showFormErrors(errors, $form);
                        }
                        else if (errors['message'] !== undefined) {
                            alert(errors['message']);
                        } 
                    },
                });
       
         });
    }
    var handleReject = function(){
         $('#btn-reject-ajax').on('click',function(e){
            e.preventDefault();
            var user_id = $('#id').val();
            var formData  =  $form.serializeArray();
            var url = APP_URL+'/leaveApp1/'+ user_id;
            var name = $('#full_name').val();
            var callback = function(){
                App.rejectForm(url, formData);
            }
    
            App.confirmBox('Reject' + name, callback);
        });
    }
      return{
        initUserForm:function(){
            if($form.length){
                handleChackDate();
                handleRequireOn();
                handleTatalDate();
                handleStatus();
                // sendMailtoApprove();
                handleApprove();
                handleReject();
            }
        }
    }
 }();
 $(document).ready(function() {   
    CheckLeave.initUserForm();
 });

