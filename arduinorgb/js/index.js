  $(document).ready(function () {
        
        $("#programa").click(function () {
             var id = $("#programa").val();
            $.ajax({
                url: 'getTemperaturas.php',
                type: 'POST',
                data: {iddia: id},
                success: function (data) {
                   
                    $('#divtemperaturas').html(data);
                }
            });
        });




    });

  function setTemp(){
   
       var  temp = $("#setpoint").val();
       var  id = $("#programa").val();
        $.ajax({
                url: 'setSetpoint.php',
                type: 'POST',
                data: {valortemp: temp, iddia: id},
                success: function (data) {   
                  alert(""+data);

                }
                
            });


  }

