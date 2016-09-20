$(function(){
                $('#datepicker').datepicker({ 
                    dateFormat: 'yy-mm-dd'
                }).datepicker('setDate', new Date());
            });
            
$(function() {
    $( "#pro" ).autocomplete({
        source: 'prosearch.php'
    });
});



$(document).ready(function(){
    $("#tom").on('click', function(){                
            $("#plus").append("<tr>\n\
                                    <td>\n\
                                        <input type='text' placeholder='Item' name='pro[]' class='pro'>\n\
                                    </td>\n\
                                    <td>  \n\
                                        <input type='number' placeholder='Quantity' value='1' name='qty[]'  id='qty'>\n\
                                    </td>\n\
                                    <td><span class='input-group'><a href='javascript:void(0);' class='rem'><i class='material-icons'>highlight_off</i></a></span></td>\n\
                                </tr>");
        });
        $("#plus").on('click','.rem',function(){
        $(this).parent().parent().parent().remove();
    });
    
    
});

$(document).on('keydown.autocomplete', '.pro', function() {
    $( ".pro" ).autocomplete({
        source: 'prosearch.php'
    });
});