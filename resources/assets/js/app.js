var App = function(){
  
    return {
            showFormErrors : function (errors, form) {
                // console.log(form);
                form.find('.form-group').removeClass('has-error');
                form.find('.error-help-block').text('');
                if (errors && errors['errors'] !== undefined) {
                    $.each(errors['errors'], function (key, value) {
                        var formGroup = form.find('#' + key).parents('.form-group');
                        if (!formGroup.length)
                            formGroup = form.find('[name=' + key +']').parents('.form-group');
        
                        formGroup.addClass('has-error')
                        var jQueryValidationElm = formGroup.find('.error-help-block');
                        if(jQueryValidationElm.length) {
                            jQueryValidationElm.text(value);
                        } else {
                            formGroup.append('<span class="help-block error-help-block text-left " >' + value + '</span>')                        
                            formGroup.find('.help-block').text(value);
                            formGroup.find('.help-block').show();
                        } 
                    });
                } else {
                    if (debug && (typeof errors == "object")) {
                        var html = errors.message;
                        if (errors.file)
                            html += ': ' + errors.file;
                        if (errors.line)
                            html += ', Line: ' + errors.line;
                    } else {
                        var html = '<strong>Oops!</strong> Something went wrong. Please contact the administrator.';
                    }
                   
                    noty({
                        text: html,
                        type: 'error',
                        layout: 'top',
                        animation: {
                            open: 'animated fadeInDown',
                            close: 'animated fadeOutUp',                    
                            speed: 250
                        }
                    });
        
                
                }
            
            },
            showBoxSuccess : function (title, type, text = '') {
                swal({
                    position: 'top-right',
                    type: 'success',
                    title: title,
                    html: text,
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            showBoxError : function (title, type, text = '') {
                swal({
                    position: 'top-right',
                    type: 'error',
                    title: title,
                    html: text,
                    showConfirmButton: false,
                    timer: 1500
                })
            },
            confirmBox : function (text, callback = '') {
                swal({
                    title: 'Are you sure you want to ',
                    text: text,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm',
                    cancelButtonText: 'Cancel',
                    allowOutsideClick: false
                }).then(function (result) {
                    if (result.value) {
                        callback();
                    }
                }).catch(swal.noop);
            },
            deleteForm : function(url, table) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            
                setTimeout(function () {
                    $.ajax({
                        url: url,
                        type: 'delete',        
                        success: function (resp) {
                            App.showBoxSuccess(resp.message,resp.status);    
                            table.ajax.reload();        
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            App.showBoxError(textStatus, 'error', errorThrown);
                        }
                    });
                }, 100);  
            },
            rejectForm :function(url,formData){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                setTimeout(function () {
                    $.ajax({
                        url: url,
                        type: 'PUT', 
                        data: formData,       
                        success: function (resp) {
                            App.showBoxSuccess('Success');    
                            window.location = APP_URL + '/leaveApp';        
                            
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            App.showBoxError(textStatus, 'error', errorThrown);
                        }
                    });
                }, 100);  

            }
           
            
        }
   

}();

