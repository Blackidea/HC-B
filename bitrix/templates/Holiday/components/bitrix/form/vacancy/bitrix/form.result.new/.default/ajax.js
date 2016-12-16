<script>
$(document).on('submit', 'form[name="OTKLIK"]', function(e) {
   
         var formData = $(this).serialize();
         $.ajax({
             type: "POST",
             url: "/ajax-forms/vacancy.php",
             data: formData,
             success: function(msg) {
                  //alert( "Прибыли данные: " + msg );
                 if (msg == "Y") {
                    $('.shadow_site').show();
                    $('#popup_feedback_sendOK').show();
                    
                     
                     //feedback.find('.o-modalHeading').html('Спасибо за заявку!');
                     //feedback.attr('data-sent', 'y');
                    $('form[name=OTKLIK]').find('input[type=text]').each(function(indx, element){
                       $(element).val('');
                     })
                      $('form[name="OTKLIK"] textarea').val('');
                     // Все ок , форма отправлена 
                     setTimeout(function(){
                        $('#popup_feedback_sendOK').hide();
                        $('.shadow_site').hide();
                       },
                     3000)
                 } else {
                     $('.feedback-form-wrapper').html(msg);
                 }
             }
         });
         //alert("!!!");
         return false;
     })
     
</script>