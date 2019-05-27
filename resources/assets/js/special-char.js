var excepts =['username','password','email'];

    excepts.forEach((excepts) => {
        // console.log(excepts);
        
        $(document).on('keypress', 'input[name="'+ excepts +'"]', function (e) {
            var code = e.keyCode || e.witch || e.charCode;
            var ffAllowCodes = [8, 9, 46,64];
            if (ffAllowCodes.indexOf(code) != -1) return true;
            if (48 <= code && code <= 57) return true;
            if (65 <= code && code <= 90) return true;
            if (97 <= code && code <= 122) return true;
            return false;
        });
    });

