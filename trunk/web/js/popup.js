/******************************************************************************/
// POP-UPS FORMS
/******************************************************************************/
function dialogs(){
    $('a.simple-link[href^=#]').click(function() {
    var popID = $(this).attr('rel'); //Get Popup Name
    var popURL = $(this).attr('href'); //Get Popup href to define size

    //Pull Query & Variables from href URL
    var query= popURL.split('?');
    var dim= query[1].split('&');
    var popWidth = dim[0].split('=')[1]; //Gets the first query string value

    //Fade in the Popup and add close button
    $('#' + popID).fadeIn().css({ 'width': Number( popWidth ) });
    ////.prepend('<a href="#" class="close"><img src="/images/_close.png" class="btn_close" title="Cerrar" alt="Cerrar" /></a>');

    //Define margin for center alignment (vertical   horizontal) - we add 80px to the height/width to accomodate for the padding  and border width defined in the css
    var popMargTop = ($('#' + popID).height() + 80) / 2;
    var popMargLeft = ($('#' + popID).width() + 80) / 2;

    //Apply Margin to Popup
    $('#' + popID).css({
        'margin-top' : -popMargTop,
        'margin-left' : -popMargLeft
    });

    //Fade in Background
    $('body').append('<div id="fade"></div>'); //Add the fade layer to bottom of the body tag.
    $('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn(); //Fade in the fade layer - .css({'filter' : 'alpha(opacity=80)'}) is used to fix the IE Bug on fading transparencies

    // Limpiamos los campos
    cleantext(popID,"textarea",null);
    cleantext(popID,"input",text);

    return false;
});

//Close Popups and Fade Layer
$('div.btn_close').live('click', function() { //When clicking on the close or fade layer...
    $('#fade , .popup_block').fadeOut(function() {
        $('#fade, a.close').remove();  //fade them both out
    });
    return false;
});
}

function cleantext(id,tagname,type){
    $('#' + id).each(function() {
        var inputs = this.getElementsByTagName(tagname);
        for(i=0; i<inputs.length; i++){
            var p = inputs[i];
            if(type!=null){
                if(p.getAttribute("type")==type){
                    p.value = "";
                }
            }else
                p.value = "";
        }
    });
}
function closePopup(nombre){

}
