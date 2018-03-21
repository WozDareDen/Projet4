$('.identifyB').click(function(){
    $('.register').slideToggle("fast");
    $('.identifyB').css('display','none');});

$('.close').click(function(){
    $('.register').css('display','none');
    $('.identifyB').css('display','block');
});