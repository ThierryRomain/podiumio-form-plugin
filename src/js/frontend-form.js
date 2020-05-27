$( document ).ready(function() {
    $(".os-form-section-question-wrapper").each(function(){
            $(this).click(function(){
                openFormSection($(this));
            });
    });

    //build menu
    $("#frontend-form-menu").append("<ul>");
    $(".os-form-section-question-wrapper").each(function(){
        $("#frontend-form-menu").append("<li><a href='javascript:void(0);' class='frontend-form-menu-link' data-target='"+ $(this).attr("id") +"'>"+ $(this).find("h4").text() +"</a></li>");
    });
    $("#frontend-form-menu").append("</ul>");

    $("a.frontend-form-menu-link").click(function(){
        openFormSection($("#"+$(this).data('target')));
        // let question_wrapper = $("#"+$(this).data('target'));
        // question_wrapper.addClass('active');
    });

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
    $(".os-form-section").each(function(){
        let validation_field = $(this).find(".validation_field").find("input:text");
        if(validation_field.val() == "updated"){
            $(this).addClass("good");
            $(this).removeClass("warning");
            $(this).find("#form-section-warning").hide();
            $(this).find("#form-section-good").show();
        }else{
            $(this).removeClass("good");
            $(this).addClass("warning");
            $(this).find("#form-section-warning").show();
            $(this).find("#form-section-good").hide();
        }
    });

    //toggle validation field if section is submitted on front end
    $(".acf-form").submit(function(e){
        let validationField = $(this).find(".validation_field");
        let validationFieldId = validationField.data('key');
        let acfValidationField = acf.getField(validationFieldId);
        acfValidationField.val("updated");
    });
});
