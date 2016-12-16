<script>
$(document).on('submit', 'form[name="FEEDBACK"]', function(e) {
    e.preventDefault();
    var $that = $(this),
    formData = new FormData($that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму (*)
    
    console.log(formData);
    //var formData = $(this).serialize();
         $.ajax({
             type: "POST",
             url: "/ajax-forms/form-contacts.php",
             contentType: false, // важно - убираем форматирование данных по умолчанию
             processData: false, // важно - убираем преобразование строк по умолчанию
             data: formData,
             ///dataType: 'json',
             success: function(msg) {
                  //alert( "Прибыли данные: " + msg );
                 if (msg == "Y") {
                    $('.shadow_site').show();
                    $('#popup_feedback_sendOK').show();
                     //feedback.find('.o-modalHeading').html('Спасибо за заявку!');
                     //feedback.attr('data-sent', 'y');
                    $('form[name=FEEDBACK]').find('input[type=text]').each(function(indx, element){
                       $(element).val('');
                     })
                      $('form[name="FEEDBACK"] textarea').val('');
                      $('.errortext').remove();
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
     })     
</script>