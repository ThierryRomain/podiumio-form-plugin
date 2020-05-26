$(".os-form-section").each(function(){
        $(this).click(function(){
            let isActive = false;
            if($(this).hasClass("active")){
                isActive = true;
            }

            $(".os-form-section").each(function(){
                $(this).removeClass("active");
                $(this).find(".os-form-section-answer-panel").hide(300);
            });

            if(!isActive){
                $(this).toggleClass("active");
                $(this).find(".os-form-section-answer-panel").toggle(300);
            }
        });
});
