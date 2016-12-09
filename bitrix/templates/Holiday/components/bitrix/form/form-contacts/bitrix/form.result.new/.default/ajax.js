<script>
$(document).on('submit', 'form[name="zayavka_main"]', function(e) {
         var formData = $(this).serialize();
         var that = $(this);
         var feedback = $('.c-modal[data-modal="4"');
         var formWrapper = feedback.find('.js-form-zayavka-about-wrapper');
         var formData = that.serialize();
         $.ajax({
             type: "POST",
             url: "/forms-ajax/zayavka-main.php",
             data: formData,
             success: function(msg) {
                 // alert( "Прибыли данные: " + msg );
                 if (msg == "Y") {
                     //alert("Спасибо , Ваша заявка отправлена");
                     feedback.find('.o-modalHeading').html('Спасибо за заявку!');
                     feedback.attr('data-sent', 'y');
                    $('form[name=zayavka_main]').find('input[type=text]').each(function(indx, element){
                       $(element).val('');
                     });
                     // Все ок , форма отправлена 
                     setTimeout(function(){
                        feedback.find('.o-modalsCtrl--hide').click();
                       },
                     3000)
                 } else {
                     $('.js-form-zayavka-main-wrapper').html(msg);
                 }
             }
         });
         return false;
     })
</script>