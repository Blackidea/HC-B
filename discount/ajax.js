<script>
$(document).ready(function(){
    

    var loading = $('.loading-gif');
    var more = $('.js-more-discounts');
    var container = $('.discounts_list');
    var section = 'discount';
    more.on('click', function(event){
        event.preventDefault();
        $(loading).show('slow');
        console.log("кол-во страниц: "+getPagesCount());
        console.log("текущая страница: "+getCurPageCount());
        console.log("следующая страница: "+genUrl());
        url = '/'+section+'/'+genUrl();
        console.log(url);
        
        $.ajax({                                                                   
           url: url,                                   
             data: '',
        	 success: function(data) {                                                      
                console.log($(data).find('.discounts_list'));
                $(container).append($(data).find('.discounts_list').contents());
                pagesCounterPlus();
                checkMoreAvailible(more);
                $(loading).hide('slow');
        	  }
          });
    })
})
function checkMoreAvailible(more){
    if(parseInt($('input[name="pageCur"]').val())>= parseInt($('input[name="pageCount"]').val())){
        more.hide();
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