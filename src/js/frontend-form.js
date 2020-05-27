$( document ).ready(function() {
    $(".os-form-section-question-wrapper").each(function(){
            $(this).click(function(){
                let isActive = false;
                if($(this).hasClass("active")){
                    isActive = true;
                }

                $(".os-form-section-question-wrapper").each(function(){
                    $(this).removeClass("active");
                    $(this).next(".os-form-section-answer-panel").hide(300);
                });

                if(!isActive){
                    $(this).toggleClass("active");
                    $(this).next(".os-form-section-answer-panel").toggle(300);
                }
            });
    });

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
