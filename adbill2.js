$(document).ready(function() {
                $('#datepicker').datepicker({ 
                    dateFormat: 'yy-mm-dd'
                }).datepicker('setDate', new Date());
            });
            
            $(function() {
                $( "#cus" ).autocomplete({
                source: 'cusearch.php'
                });
            });
            
            $(function() {
                $( "#pro" ).autocomplete({
                source: 'prosearch.php'
                });
            });
            var n=1;
            $(document).ready(function(){
                $("#tom").on('click', function(){               
                    $("#plus").append("<tr>\n\
                                    <td>\n\
                                        <input type='text' id='"+n+"' placeholder='Item' name='pro[]' class='pro' onkeyup='getPrice(this.value)'>\n\
                                    </td>\n\
                                    <td>  \n\
                                        <input type='number' placeholder='Quantity' value='1' name='qty[]'  id='qty"+n+"' onkeyup='amt(this.value)'>\n\
                                    </td>\n\
                                    <td>\n\
                                        <div id='txtHint"+n+"'><input type='text' value='' placeholder='Rate' name='rate[]' id='pri"+n+"' onkeyup='pamt(this.value)'></div>\n\
                                    </td>  \n\
                                    <td><div id='total"+n+"'><input type='text' id='ntotal'></div></td> \n\
                                     <td><span class='input-group'><a href='javascript:void(0);' class='rem'><i class='material-icons'>highlight_off</i></a></span></td>\n\
                                </tr>"); 
                    n++;
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
        
        function getPrice(str) {
            
            var i = $("#n");
                
             if (str == "") {
                        document.getElementById("txtHint"+i).innerHTML = "";
                        return;
                    } else {
                        if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        } else {
                            // code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function() {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                document.getElementById("txtHint"+i).innerHTML = xmlhttp.responseText;
                            }
                        };
                        xmlhttp.open("GET","getprice.php?q="+str,true);
                        xmlhttp.send();
                    }
                
            
                  
            }
                
                function amt(val){
                    var price = document.getElementById("pri").value;
                    
                    var total = val * price;
                     document.getElementById("total").innerHTML = "<input type='text' value='"+total+"'>";
                }
                
                function pamt(val){
                    var qty = document.getElementById("qty").value;
                    var total = val * qty;
                    document.getElementById("total").innerHTML = "<input type='text' value='"+total+"'>";
                }

