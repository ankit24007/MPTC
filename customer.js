$(document).ready(function () {
            $('.one').on('click',function(e){
               e.preventDefault();
               $value = $(this).text();
               
               document.getElementById("myModalLabel").innerHTML = $value;
                           
                    if ($value == "") {
                        document.getElementById("bdata").innerHTML = "";
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
                                document.getElementById("bdata").innerHTML = xmlhttp.responseText;
                            }
                        };
                        xmlhttp.open("GET","getData.php?q="+$value,true);
                        xmlhttp.send();
                    }
                
            });
        });

