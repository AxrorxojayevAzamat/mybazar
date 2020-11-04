<script>

//////////// changePassword Auth User
    $(document).ready(function () {
        
        $('#changePassword').on('click', function () {
        
            let currentPassword = $('#currentPassword').val();
            let newPassword = $('#newPassword').val();
            $.ajax({
                    url: '/change-password',
                    type: 'POST',
                    data: {
                        current_password: currentPassword,
                        new_password: newPassword
                    },
                    dataType: 'json',
                    
                    success: function (data) {
                        alert(data['message']);
                    },
        
                    error: function (data) {
                        let errors = data.responseJSON;
                        alert(errors['message']);
                        console.log(errors['errors'])
                    }
            });
        });
    });
        
        
//////////// changePhone with confirm code
    $(document).ready(function () {
        
        $('#changePhone').on('click', function () {
            let userPhone = $('#userPhone').val();
            
            $.ajax({
                url: '/phone',
                type: 'POST',
                data: { 
                    phone: userPhone,
                    
                },
                dataType: 'json',
                    
                success: function (data) {
                        alert(data['message']);
                    },
        
                    error: function (data) {
                        let errors = data.responseJSON;
                        alert(errors['message']);
                        console.log(errors['errors'])
                    }
                    });
            });
        });
        
    $(document).ready(function () {
        
        $('#confirmPhone').on('click', function () {
            let confirmCode = $('#confirmCode').val();
            let userPhone = $('#userPhone').val();
            
            $.ajax({
                url: '/phone-verify',
                type: 'PUT',
                data: {
                    phone_verify_token: confirmCode,
                    phone: userPhone,
                },
                dataType: 'json',
                success: function (data) {
                        alert(data['message']);
                    },
        
                    error: function (data) {
                        let errors = data.responseJSON;
                        alert(errors['message']);
                        console.log(errors['errors'])
                    }
                    });
            });
        });
        
        
let avatarInput = $("#avatar-input");
let avatarUrl = '{{ $user ? ($user->profile ? ($user->profile->avatar ? $user->profile->avatarOriginal : null) : null ): null }}';

let send = XMLHttpRequest.prototype.send, token = $('meta[name="csrf-token"]').attr('content');
XMLHttpRequest.prototype.send = function (data) {
    this.setRequestHeader('X-CSRF-Token', token);
    return send.apply(this, arguments);
};

if (avatarUrl) {
    avatarInput.fileinput({
        initialPreview: [avatarUrl],
        initialPreviewAsData: true,
        showUpload: false,
        previewFileType: 'text',
        browseOnZoneClick: true,
        overwriteInitial: true,
        deleteUrl: 'remove-avatar',
        maxFileCount: 1,
        allowedFileExtensions: ['jpg', 'jpeg', 'png'],
    });
} else {
    avatarInput.fileinput({
        showUpload: false,
        previewFileType: 'text',
        browseOnZoneClick: true,
        maxFileCount: 1,
        allowedFileExtensions: ['jpg', 'jpeg', 'png'],
    });
}


</script>
