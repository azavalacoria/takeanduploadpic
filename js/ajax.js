function getStudent () {
    numberOfControl = $('#control-number').val();
    console.log("size = " + numberOfControl.length);
    $("#noStudent").fadeOut(100);
    size = numberOfControl.length;
    if (size == 8) {
        //console.log("noc = " + $('#control-number').val());
        $.ajax({
            url : 'http://hawkzc.com/camara/getStudent.php',
            data : { numberOfControl : numberOfControl },
            type : 'POST',
            dataType : 'json',
            success : function(json) {
                console.log("error" + json.error);
                error = json.error;
                if (error == false && json.count == 1) {

                    console.log(json.alumno.nombres);
                    $("#names").html(json.alumno.nombres);
                    $("#first-lastname").html(json.alumno.apellidoPaterno);
                    $("#second-lastname").html(json.alumno.apellidoMaterno);
                    $("#cambuttons").fadeIn(400);
                } else {
                    $("#names").html("");
                    $("#first-lastname").html("");
                    $("#second-lastname").html("");
                    $("#noStudent").fadeIn(400);
                    $("#cambuttons").fadeOut(400);
                }
            },
            error : function(xhr, status) {
                alert('Disculpe, existió un problema');
            },
            complete : function(xhr, status) {
                
            }
        });
    };
}
