$( document ).ready(function() {
    acfRepeaterRowColors();
    $(".os-form-section-question-wrapper").each(function(){
            $(this).click(function(){
                openFormSection($(this));
            });
    });

    //build menu
    // let to_append = "<ul>";
    // $(".os-form-section-question-wrapper").each(function(){
    //     to_append += "<li><a href='javascript:void(0);' class='frontend-form-menu-link' data-target='"+ $(this).attr("id") +"'>"+ $(this).find("h4").text() +"</a></li>";
    // });
    // to_append += "</ul>";
    // $("#frontend-form-menu").append(to_append);
    //
    // $("a.frontend-form-menu-link").click(function(){
    //     openFormSection($("#"+$(this).data('target')));
    // });

    function openFormSection(elem){
        let isActive = false;
        if(elem.hasClass("active")){
            isActive = true;
        }

        $(".os-form-section-question-wrapper").each(function(){
            $(this).removeClass("active");
            $(this).next(".os-form-section-answer-panel").hide(300);
        });

        if(!isActive){
            elem.toggleClass("active");
            elem.next(".os-form-section-answer-panel").toggle(300);
        }
    }


    //check if form has been modified
    // let tab_is_open = false;
    // let tab_to_open;
    $(".os-form-section").each(function(){
        let validation_field = $(this).find(".validation_field").find("input:text");
        if(validation_field.val() == "updated"){
            $(this).addClass("good");
            $(this).removeClass("warning");
            $(this).find("#form-section-warning").hide();
            $(this).find("#form-section-good").show();
        }else if(validation_field.length != 0){
            // if(!tab_is_open){
            //     tab_is_open = true;
            //     tab_to_open = $(this).find('.os-form-section-question-wrapper');
            // }
            $(this).removeClass("good");
            $(this).addClass("warning");
            $(this).find("#form-section-warning").show();
            $(this).find("#form-section-good").hide();
        }
    });
    //open tab on load
    // if(tab_is_open){
    //     openFormSection(tab_to_open);
    // }


    //toggle validation field if section is submitted on front end
    $(".acf-form").submit(function(e){
        let validationField = $(this).find(".validation_field");
        if(validationField.length !=0){
            let validationFieldId = validationField.data('key');
            let acfValidationField = acf.getField(validationFieldId);
            acfValidationField.val("updated");
        }
    });


    /**
     *  Changes the color of all repeaters acf field depending on if the element is an odd or even number
     */
    function acfRepeaterRowColors(){
        $('.acf-row-handle span:odd').each(function(){
            $(this).parent().css('background-color','#cccccc');
            $(this).parent().parent().find('.acf-row-handle.remove').css('background-color','#cccccc');
        });
    }

    //send email letting us know the form is completed
    $('#frontend_form_finish').submit(send_filled_form_email);
    function send_filled_form_email() {
        var comments = document.getElementById("comments").value;
        $.ajax({
            type: "POST",
            url: jsObj.ajaxurl,
            data: {
                action : 'frontend_form_filled_submission',
                comments : comments
            },
            success: function(html) {
                $('#frontend_form_filled_feedback').html(html);
                $('#frontend_form_filled_feedback').show(200);
            },
            error: function(html){
                $('#frontend_form_filled_feedback').html(html);
                $('#frontend_form_filled_feedback').show(200);
            }
        });
        return false;
    }

    //deactivate pre loader
    $("#form-preloader").fadeOut(400);
});
