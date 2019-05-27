var User = function(){
    var userId;
    var users_id;
    var avatarDropzone;
    var isEditMode = false;
    var submitMethod = $('[name="_method"]').val();
    console.log($('[name="_method"]').val());
    Dropzone.autoDiscover = false;
    var $userForm = $('#form-user');
    var isAvatarDropzoneSended = false;
    var initDate = function(){
        $('#StartWorkingDate').datetimepicker();
        $('#StopWorkingDate').datetimepicker();
        $('#BirthDate').datetimepicker({format:'Y-m-d'});
    }
    var initHidePassword = function(){
        var userId = $('#user_id').val();
        if(userId != null){
            $('.password-form').hide();   
        }
        if(userId == ''){ 
            $('.password-form').show();
        }
    }
    var deleteFiles = function (id) {
        users_id = $('#user_id').val();
        console.log(users_id);

        $.ajax({
            type: 'GET',
            url: APP_URL  + '/deleteImg/'+ users_id , 
            autoProcessQueue: true,
            success: function( resp ) { 
            },
            error: function(jqXhr) {
                
            }
        });
    };
    var token = $('meta[name="csrf-token"]').attr('content');
    var initCreateUserForm = function() {
        users_id = $('#user_id').val();
        isEditMode = users_id.length;
    }
    var initUploadDropzone = function(){
        var fallbackImg = APP_URL + '/images/noimage.png';
        var avatarClose = $('.avatar-close');
        var avatarImg = $('#inputGroupFile01');

        $('#inputGroupFile01').dropzone({ 
            url: APP_URL +'/uploadimage',
            autoProcessQueue: false,
            uploadMultiple: false,
            paramName: 'avatar',
            maxFiles: 1, 
            parallelUploads: 100,
            maxFilesize: 5048, // MB
            acceptedFiles: ".jpeg, .jpg, .png, .gif",
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
                    if(isEditMode){
                        window.location = APP_URL + '/user/' + userId+'/edit';
                    }else{
                        window.location = APP_URL + '/user';
                    }  
                });
            }
        });

        
    }
    var handleReset = function(){
        $('#btn-reset-ajax').on('click',function(e){
            e.preventDefault();
            var user_id = $('#user_id').val();
            if(user_id != null){
                window.location = APP_URL + '/user';
            }
        });
    }
   
    var handleSubmit = function(){
        $('#btn-submit-ajax').on('click',function(e){
            e.preventDefault();
            var user_id = $('#user_id').val();
           
            console.log(user_id);
            var formData  = $userForm.serializeArray();
            var submitURL = isEditMode? APP_URL+'/user/' + user_id : APP_URL+'/user' ;
            
            var fileImages = $('#inputGroupFile01');
            // console.log(fileImages);
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                });
                
                $.ajax({
                    type: submitMethod,
                    url: submitURL,
                    cache:false,
                    data: formData,
                    success: function(resp){
                        userId = resp.data.users_id;
                        console.log(userId);
                        if(fileImages){
                            avatarDropzone.processQueue();
                            if(isEditMode){
                                App.showBoxSuccess('save success');
                                window.location = APP_URL + '/user/' + userId+'/edit';
                            }else{
                                App.showBoxSuccess('save success');
                                window.location = APP_URL + '/user';
                            }   
                        } else {
                            if(isEditMode){
                                App.showBoxSuccess('save success');
                                window.location = APP_URL + '/user/' + userId+'/edit';
                            }else{
                                App.showBoxSuccess('save success');
                                window.location = APP_URL + '/user';
                            }    
                        }
                    },
                    error:function(jqXhr){                                            
                        var errors = jqXhr.responseJSON;
                        if (errors['errors'] !== undefined)
                        {                    
                            App.showFormErrors(errors, $userForm);
                        }
                        else if (errors['message'] !== undefined) {
                            alert(errors['message']);
                        } 
                    },
                    
                });
            
        });
    }

    return{
        initUserForm:function(){
            if($userForm.length){
                initDate();
                initHidePassword();
                initCreateUserForm();
                handleSubmit();
                handleReset();
                initUploadDropzone();
                // handleUploadDropzone();
            }
        }
    }
}();
$(document).ready(function() {   
    User.initUserForm();
});