// const profile_modal = bootstrap.Modal.getOrCreateInstance(document.querySelector("#my-profile-modal"))
// const cropper_modal = bootstrap.Modal.getOrCreateInstance(document.querySelector("#my-profile-photo-crop-modal"))
// const password_modal = bootstrap.Modal.getOrCreateInstance(document.querySelector("#change-password-modal"))
// let cropper;

// let is_authenticated = false;
// document.querySelector("#user-photo").addEventListener("change", function () {
//     profile_modal.hide();
//     const image = document.querySelector("#my-profile-photo-crop-image");
//     const [file] = this.files
//     if (file) {
//         image.src = URL.createObjectURL(file)
//     }

//     cropper = new Cropper(image, {
//         aspectRatio: 1 / 1,
//         dragMode: "move",
//         viewMode: 1,
//         background: false,
//         minContainerWidth: 450,
//         minContainerHeight: 420,
//         cropBoxMovable: false,
//         cropBoxResizable: false,
//     });
//     cropper.reset()
//     cropper_modal.show();
// })

// document.querySelector("#my-profile-photo-crop-modal").addEventListener('hidden.bs.modal', event => {
//     if(cropper){
//         cropper.destroy()
//     }
// })

$("#my-profile-photo-crop-modal #crop-button").click(function(){
    const cropped_image = cropper.getCroppedCanvas().toDataURL('image/jpeg');
    pageLoader(true);
    $.ajax({
        type: "POST",
        url: base_url + '/UtilController/uploadUserAvatar/'+user_id,
        data: {'dataURL': cropped_image},
        success: (data)=>{
            if(!data){
                alert( "Something went wrong" );
                pageLoader(false);
            }else{
                $.post(base_url+'/users/updateUserPhoto/'+user_id+'/'+data)
                    .done(function() {
                        $.post(base_url + '/UtilController/moveUserAvatar/'+data)
                            .done(function(){
                                $(".user-avatar").attr("src", base_url+"/public/assets/media/avatars/"+data)
                                pageLoader(false);
                                cropper_modal.hide();

                            }).fail(function() {
                                alert( "Something went wrong" );
                                pageLoader(false);

                            })
                    })
                    .fail(function() {
                        alert( "Something went wrong" );
                        pageLoader(false);
                    })
            }
        },
    });
})

$("#my-profile-form").submit(async function (e) { 
    e.preventDefault();
    await updateUser(this)
    setTimeout(() => {
        location.reload();
    }, 500);
});

$(".password-toggle").click(function(){
    const password_field = $(this).parent().find(`.password-target`)
    if(password_field.attr("type")=="password"){
        password_field.attr("type", "text")
        $(this).find('i').addClass("ri-eye-line").removeClass("ri-eye-off-line");
    }else{
        password_field.attr("type", "password")
        $(this).find('i').removeClass("ri-eye-line").addClass("ri-eye-off-line");
    }
})

$(".change-password-submit").click(function(){
    const change_password_error_handler = $("#change-password-error")
    change_password_error_handler.hide();
    const current_password = $("#current-password").val();
    if(!is_authenticated){
        $.post(base_url+"/users/authenticateUser", {password: current_password})
            .done(function(data){
                console.log(data)
                is_authenticated = data?true:false;
                if(data){
                    $(".current-password-container").slideUp("fast", "linear", function(){
                        $(".new-password-container").slideDown()
                    });
                }else{
                    change_password_error_handler.css("display", "block").html("<b>Authentication Error:</b> Password Incorrect")
                }
            }).fail(function(data){
                change_password_error_handler.css("display", "block").html("<b>Error:</b> Something went wrong")
                is_authenticated = false;
            })  
    }else{
        console.log("now checking new password")
        const new_password = $("#new-password").val()
        const repeat_new_password = $("#repeat-new-password").val()
        if(new_password.length < 8){
            change_password_error_handler.css("display", "block").html("<b>Invalid Password:</b> Password must be atleast 8 characters")
        }else if(new_password!==repeat_new_password){
            change_password_error_handler.css("display", "block").html("<b>Invalid Password:</b> Passwords do not match")
        }else{
            $.post(base_url+"/users/updateAccountPassword/"+user_id, {'new_password': new_password, 'confirm_new_password':repeat_new_password })
                .done(function(data){
                    if(data){
                        password_modal.hide()
                        Swal.fire({
                            icon: 'success',
                            title: "Password Successfully Updated!",
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }else{
                        change_password_error_handler.css("display", "block").html("<b>Error:</b> Something went wrong")
                    }
                }).fail(function(data){
                    change_password_error_handler.css("display", "block").html("<b>Error:</b> Something went wrong")
                })  
        }
        is_authenticated = false;
    }
})

document.querySelector("#change-password-modal").addEventListener('hidden.bs.modal', event => {
    is_authenticated = false;
    $(".current-password-container").show()
    $(".new-password-container").hide()
    $("#current-password").val('')
    $("#new-password").val('')
    $("#repeat-new-password").val('')
})

/**
 * It returns the first item in an array that has a property with a value equal to the id you pass in.
 * @param array - the array you want to search
 * @param id - the id of the item you want to find
 * @param id_name - the name of the id in the array
 * @returns The first element in the array that matches the condition.
 */
function searchArrayById(array, id, id_name){
    return array.find((array_item) => array_item[id_name]==id)
}

/**
 * It takes a form selector as an argument and resets the form.
 * @param form_selector - The selector of the form you want to reset.
 */
function resetForm(form_selector){
    document.querySelector(form_selector).reset()
}

/**
 * It takes a string, creates a new DOMParser, parses the string as HTML, and returns the text content
 * of the document element
 * @param input - The string to decode.
 * @returns The string "&lt;p&gt;Hello World&lt;/p&gt;"
 */
function htmlDecode(input) {
    var doc = new DOMParser().parseFromString(input, "text/html");
    return doc.documentElement.textContent;
}

/**
 * It reloads the dataTable with the new url if the url is provided, otherwise it reloads the dataTable
 * with the same url.
 * @param dataTable - The DataTable object
 * @param [url=false] - The URL to send the AJAX request to.
 */
function reloadDataTable(dataTable, url=false){
    if(url){
        dataTable.ajax.url(url).load();
    }else{
        dataTable.ajax.reload();
    }
}

/**
 * If the boolean is true, it will add a loading screen to the body of the page. If the boolean is
 * false, it will remove the loading screen from the body of the page.
 * @param [bool=false] - true/false
 */
function pageLoader(bool=false, message=null){
    if(bool){
        $("body").prepend(`
            <div id="page-loader" class="position-fixed w-100 h-100 top-0 start-0 bg-dark bg-opacity-50 d-flex flex-column justify-content-center align-items-center text-white" style="z-index: 10000;">
                <div class="spinner-border text-light mb-5" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden"></span>
                </div>
                ${message}
            </div>
        `)
    }else{
        $("body").find("#page-loader").remove()
    }
}

$('#sidebar .menu-item .menu-link').each(function() {

    if ($(this).attr('href') == window.location.href) {

        // console.log(this);
        console.log($(this).addClass('active border-3 border-start border-primary'));
        // $(this).child().addClass('active');
        // alert();
    }   
    // console.log($(this));

    // console.log(url);
});

// GET SELECTED SYSTEM USERS
let system_user  = async (url, system_id) => {
    return $.post(url, {'system_id' : system_id}, function(data, status){}, 'json');
}

let logListPerDate  = async (url, system_id) => {
    return $.post(url, {'system_id' : system_id}, function(data, status){}, 'json');
}

let filterObject = async(object, filterKey, filterValue) => {
    let filteredObj = object.filter(obj => obj[filterKey] == filterValue);
    return filteredObj;
}

let sendToForm = async(object) => {
    $.each(object, (key, val) => {
        $('#' + key).val(val);
    });

    return true;
}

let confirm = (title, message, icon, url, formData, callBack) => {
    Swal.fire({
        icon: icon,
        iconColor: 'var(--kt-white)',
        title: '<span class = "fw-semibold fs-1">CONFIRM</span>',
        html: '<span class = "text-gray-600">'+message+'</span>',
        background: `var(--kt-white)`,
        customClass: {
            icon: 'shadow-md m-0 fs-2 mt-5',
            confirmButton: "btn btn-warning",
            cancelButton: 'btn btn-light-warning',
            header: 'p-0 m-0 bg-warning pt-7 pb-5',
            title: 'w-100 m-0 text-white flex-center pt-3 pb-10',
            loader: 'pt-20',
            content: 'pt-5',
            popup: 'pb-7',
        },
        focusConfirm: false,
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: 'Yes, proceed.',
    }).then((result) => {
        if(result.isConfirmed){
            ajaxRequest(url, formData, callBack);
        }
    })
}


let successAlert = (title, message, icon) => {
    Swal.fire({
        icon: icon,
        iconColor: 'var(--kt-white)',
        title: '<span class = "fw-semibold fs-1">SUCCESS</span>',
        html: '<span class = "text-gray-600">'+message+'</span>',
        background: `var(--kt-white)`,
        customClass: {
            icon: 'shadow-md m-0 fs-2 mt-5',
            confirmButton: "btn btn-success w-50",
            header: 'p-0 m-0 bg-success pt-7 pb-5',
            title: 'w-100 m-0 text-white flex-center pt-3 pb-10',
            loader: 'pt-20',
            content: 'pt-5',
            popup: 'pb-7',
        },
        focusConfirm: false,
        buttonsStyling: false,
    });
}

let errorAlert = (title, message, icon) => {
    Swal.fire({
        icon: icon,
        iconColor: 'var(--kt-white)',
        title: '<span class = "fw-semibold fs-1">ERROR</span>',
        html: '<span class = "text-gray-600">'+message+'</span>',
        background: `var(--kt-white)`,
        customClass: {
            icon: 'shadow-md m-0 fs-2 mt-5',
            confirmButton: "btn btn-danger w-50",
            header: 'p-0 m-0 bg-danger pt-7 pb-5',
            title: 'w-100 m-0 text-white flex-center pt-3 pb-10',
            loader: 'pt-20',
            content: 'pt-5',
            popup: 'pb-7',
        },
        focusConfirm: false,
        buttonsStyling: false,
    });
}

let ajaxRequest = (url, formData, callBack) => {
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: formData,
        success: (data) => {
            callBack(data);
        },
        error: (error) => {
            response =  false;
        }
    });
}

// DATATABLES BUTTONS HOOK START
function dataTablesButtonsHooks(tableElement){
    let buttons = new $.fn.dataTable.Buttons(tableElement, {
        buttons: [
            {
                extend: 'copyHtml5',
                title: 'Data Copied'
            },
            {
                extend: 'excelHtml5',
                title: 'Excel Report'
            },
            {
                extend: 'csvHtml5',
                title: 'CSV Report'
            },
            {
                extend: 'pdfHtml5',
                title: 'PDF Report'
            }
        ]
    }).container().appendTo($('#dataTableButtonsHook'));
    
    const exportButtons = document.querySelectorAll('#dataTableExportMenu [data-kt-export]');
    
    exportButtons.forEach(exportButton => {
        exportButton.addEventListener('click', e => {
            e.preventDefault();
    
            // Get clicked export value
            const exportValue = e.target.getAttribute('data-kt-export');
            const target = document.querySelector('.dt-buttons .buttons-' + exportValue);
    
            // Trigger click event on hidden datatable export buttons
            target.click();
        });
    });
}


// DATATABLES BUTTONS HOOK START