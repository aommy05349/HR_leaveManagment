var Leave =function(){
    $('.One-date').hide();  
    var avatarDropzone;
    var userId;
    var $leaveForm = $('#form-leave');
    Dropzone.autoDiscover = false;
    var token = $('meta[name="csrf-token"]').attr('content');
    // var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    // console.log(today);
    var initLeaveDate = function(){
        $('#btn-oneDays').on('click',function(e){
            $('.More-than').hide();  
            $('.One-date').show(); 
        }); 
        $('#btn-moreDays').on('click',function(e){
            $('.More-than').show();  
            $('.One-date').hide();  
        }); 
    }

    var initDate = function(){
      
        $('#startDate').datetimepicker();
        $('#endDate').datetimepicker();
        $('#date-to-leave').datetimepicker();
        
    } 
   var  initResetForm = function(){
       $('#btn-reset-ajax').on('click',function(e){
               window.location = APP_URL + '/leave';
       })
   }
   var initUploadDropzone = function(){
    var fallbackImg = APP_URL + '/images/noimage.png';
    var avatarClose = $('.avatar-close');
    var avatarImg = $('#inputGroupFile01');

    $('#inputGroupFile01').dropzone({ 
        url: APP_URL +'/uploadfile',
        autoProcessQueue: false,
        uploadMultiple: false,
        paramName: 'avatar',
        maxFiles: 1, 
        parallelUploads: 100,
        maxFilesize: 5048, // MB
        acceptedFiles: ".jpeg, .jpg, .png, .gif ,.pdf",
        headers: {
            'X-CSRF-TOKEN': token 
        },
        init:function(){
            avatarDropzone = this;
            avatarClose.click(function(){
                // console.log('click') 
                var id = $(this).siblings('#inputGroupFile01').attr('data-id');
                if(id) {
                    $(this).siblings('#inputGroupFile01').attr('data-id',null);
                    console.log(id);
                    deleteFiles(id);
                }
                else{
                    avatarDropzone.removeAllFiles();
                } 
                avatarClose.css('visibility', 'hidden');
                avatarImg.attr('src',fallbackImg);
            });

            this.on('thumbnail', function(file,dataUrl) { 
                if(file.accepted){ 
                    // console.log(dataURL);
                    avatarImg.attr('src',dataUrl);  
                    avatarClose.css('visibility', 'visible'); 
                }
             }); 

            this.on("sending", function(file, xhr, formData) {
                formData.append("user_id", userId);
            });

            this.on('error', function( file, resp ){
                console.log(resp);
             });

            this.on("queuecomplete", function (file) {
                console.log('queue done');
                
                    window.location = APP_URL + '/leave';
                
            });
        }
    });

    
}
    var handleSubmit = function(){
        $('#btn-submit-ajax').on('click',function(e){
            // console.log('success');
            e.preventDefault();
            var formData  = $leaveForm.serializeArray();
            var submitURL = APP_URL+'/leave' ;
            var fileImages = $('#inputGroupFile01');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });
            $.ajax({
                type: 'POST',
                url: submitURL,
                cache:false,
                data: formData,
                success: function(resp){
                    userId = resp.leaves.id;
                    App.showBoxSuccess('request success');
                    if(fileImages){
                        avatarDropzone.processQueue();
                    }
                    window.location = APP_URL + '/leave';
                        
                },
                error:function(jqXhr){  
                    console.log('errror123456');                                          
                    var errors = jqXhr.responseJSON;
                    if (errors['errors'] !== undefined)
                    {                    
                        App.showFormErrors(errors,$leaveForm);
                    }
                    else if (errors['message'] !== undefined) {
                        alert(errors['message']);
                    } 
                },
                
            });

        });
    }

    return{
        initLeaveForm:function(){
            if($leaveForm.length){
                initLeaveDate();
                initDate();
                initResetForm();
                handleSubmit();
                initUploadDropzone();
            }
        }
    }
}();
$(document).ready(function() {   
    Leave.initLeaveForm();
});
