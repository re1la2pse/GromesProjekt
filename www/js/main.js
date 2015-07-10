$(function(){

    $('#homepageForm').hide();

    $('#searchButton').click(function(){
        $('#homepageForm').slideToggle();
        return false;
    });
});
