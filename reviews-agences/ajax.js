<script>
$(document).ready(function(){
    
    
    var loading = $('.loading-gif');
    var more = $('.js-reviews-more');
    var container = $('.reviews_list');
    
    more.on('click', function(event){
        event.preventDefault();
        $(loading).show('slow');
        console.log("кол-во страниц: "+getPagesCount());
        console.log("текущая страница: "+getCurPageCount());
        console.log("следующая страница: "+genUrl());
        url = '/reviews-agences/'+genUrl();
        console.log(url);
        
        $.ajax({                                                                   
           url: url,                                   
             data: '',
        	 success: function(data) {                                                      
                console.log($(data).find('.reviews_list'));
                $(container).append($(data).find('.reviews_list').contents());
                pagesCounterPlus();
                checkMoreAvailible();
                $(loading).hide('slow');
        	  }
          });
    })
})
function checkMoreAvailible(){
    if(parseInt($('input[name="pageCur"]').val())>= parseInt($('input[name="pageCount"]').val())){
        $('.js-reviews-more').hide();
    }
    else{
        console.log('еще есть страницы');
    }
}
function pagesCounterPlus(){
    $('input[name="pageCur"]').val(parseInt($('input[name="pageCur"]').val())+1);
}
function getPagesCount(){
    return $('input[name="pageCount"]').val();
}
function getCurPageCount(){
    return $('input[name="pageCur"]').val();
}
function getNextPage(){
     return parseInt(getCurPageCount())+1;
}
function genUrl(){
    url = "?PAGEN_1="+getNextPage();
    return url;
}
</script>