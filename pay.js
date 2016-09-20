$(document).ready(function(){
    $("#tomm").on('change', function(){
        var n = this.value;
        if(n == "Cheque"){
            $("#pluss").empty();
            $("#pluss").append("\n\
                                    <div class='form-group'>\n\
                                        <input type='text' name='pdate' placeholder='Cheque Date' id='datepicker2' value='' class='po form-control'>\n\
                                </div>\n\
                                    <div class='form-group label-floating'>\n\
                                        <input type='text' name='tbank' placeholder='Bank Name' value='' class='form-control'>\n\
                                </div>\n\
                                <div class='form-group'>\n\
                                    <input type='text' name='refno' value='' placeholder='Cheque No.' class='form-control'>\n\
                                </div>");
        }else if(n == "NEFT"){
            $("#pluss").empty();
            $("#pluss").append("<div class='form-group label-floating'>\n\
                                        <input type='text' name='tbank' placeholder='Bank Name' value='' class='form-control'>\n\
                                </div>\n\
                                <div class='form-group'>\n\
                                    <input type='text' name='refno' value='' placeholder='Reference No.' class='form-control'>\n\
                                </div>");
        } else{
            $("#pluss").empty();
        }        
    });   
});

