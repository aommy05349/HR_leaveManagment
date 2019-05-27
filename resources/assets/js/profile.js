var Profile = function(){
    var userId;
    var users_id;
    var avatarDropzone;
    // console.log($('[name="_method"]').val());
    Dropzone.autoDiscover = false;
    var $profileForm = $('#form-profile');
    var initBirthDate = function(){
        $('#ChangBirth').on('click',function(e){
            $('.showBirthdate').hide();
            $('.BirthDate').show()
        });

         $('#BirthDate').datetimepicker({ format:'Y-m-d'});
         var birth = $('#showtime-birthdate').val();
        var request = String(moment(birth).format('D MMM YYYY '));
        return  $(".showtime-birthdate").html(request); 
       
    }
    var initStartWorkingDate = function(){
        var start = $('#start-working-date').val();
            var request = String(moment(start).format('D MMM YYYY '));
            return  $(".start-working-date").html(request); 
            
    } 
    var initStopWorkingDate = function(){
        var stop = $('#stop-working-date').val();
            var request = String(moment(stop).format('D MMM YYYY '));
            return  $(".stop-working-date").html(request);        
    } 

    var deleteFiles = function (id) {
        users_id = $('#user_id').val();
        console.log(users_id);

        $.ajax({
            type: 'GET',
            url: APP_URL  + '/deleteProfile/'+ users_id , 
            autoProcessQueue: true,
            success: function( resp ) { 
            },
            error: function(jqXhr) {
                
            }
        });
    };
    var token = $('meta[name="csrf-token"]').attr('content');
    var initProfileForm = function() {
        users_id = $('#user_id').val();
        isEditMode = users_id.length;
    }
    var initUploadDropzone = function(){
        var fallbackImg = APP_URL + '/images/noimage.png';
        var avatarClose = $('.avatar-close');
        var avatarImg = $('#inputGroupFile01');

        $('#inputGroupFile01').dropzone({ 
            url: APP_URL +'/uploadprofile',
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
                 
                        window.location = APP_URL + '/profile/' + userId;
                   
                });
            }
        });

        
    }
    var handleReset = function(){
        $('#btn-reset-ajax').on('click',function(e){
            e.preventDefault();
            var user_id = $('#user_id').val();
            if(user_id != null){
                window.location = APP_URL + '/profile/' + + user_id;;
            }
        });
    }
   
    var handleSubmit = function(){
        $('#btn-submit-ajax').on('click',function(e){
            e.preventDefault();
            var user_id = $('#user_id').val();
           
            console.log(user_id);
            var formProfile  = $profileForm.serializeArray();
            var submitURL = APP_URL+'/profile/' + user_id ;
            
            var fileImages = $('#inputGroupFile01');
            // console.log(fileImages);
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                });
                
                $.ajax({
                    type: 'PUT',
                    url: submitURL,
                    cache:false,
                    data: formProfile,
                    success: function(resp){
                        userId = resp.data.users_id;
                        console.log(userId);
                        if(fileImages){
                            avatarDropzone.processQueue();
                            window.location =  APP_URL+'/profile/' + user_id  ;
                            App.showBoxSuccess('save success');
                           
                        } else {
                            window.location = 
                            App.showBoxSuccess('save success');
                              
                        }
                    },
                    error:function(jqXhr){                                            
                        var errors = jqXhr.responseJSON;
                        if (errors['errors'] !== undefined)
                        {                    
                            App.showFormErrors(errors, $profileForm);
                        }
                        else if (errors['message'] !== undefined) {
                            alert(errors['message']);
                        } 
                    },
                    
                });
            
        });
    }

    return{
        initFormProfile:function(){
            if($profileForm.length){
                initBirthDate();
                initStartWorkingDate();
                initStopWorkingDate();
                initProfileForm();
                handleSubmit();
                handleReset();
                initUploadDropzone();
                // handleUploadDropzone();
            }
        }
    }
}();
$(document).ready(function() {   
    Profile.initFormProfile();
});