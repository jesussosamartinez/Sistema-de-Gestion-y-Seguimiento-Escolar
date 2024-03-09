

function iniciar(control_id){
    const redNeuronal = new brain.NeuralNetwork();

    $.post("../ajax/seguimientos.php?op=NAC", { control_id : control_id }, function(data, status){
        var data = JSON.parse(data);

       const alumnos = data.aaData[0].alumnos;// cantidad de alumnos 
       const ap = data.aaData[0].Aprobados;
       const na = data.aaData[0].Naprobados;

       const $ap = (ap * 100) / alumnos;
       const $nap = (na * 100) / alumnos;

    const datos = [
        {
            "input" : { "Aprobados" : 0.9, "Reprobados" : 0.1 }, //Datos
            "output" : { "verde" : 1} //Salida para mostrar
        }, 
        {
            "input" : { "Aprobados" : 0.8, "Reprobados" : 0.2 }, //Datos
            "output" : { "Naranja" : 1} //Salida para mostrar
        },
        {
            "input" : { "Aprobados" : 0.5, "Reprobados" : 0.5 }, //Datos
            "output" : { "Rojo" : 1} //Salida para mostrar
        },
        {
            "input" : { "Aprobados" : 0.7, "Reprobados" : 0.3 }, //Datos
            "output" : { "Rojo" : 1} //Salida para mostrar
        },
        {
            "input" : { "Aprobados" : 0.4, "Reprobados" : 0.6 }, //Datos
            "output" : { "Emergencia" : 1} //Salida para mostrar
        },
        {
            "input" : { "Aprobados" : 0.2, "Reprobados" : 0.8 }, //Datos
            "output" : { "Emergencia" : 1} //Salida para mostrar
        }
    ];

    redNeuronal.train(datos);

    let resultado = brain.likely({"Aprobados": $ap ,"Reprobados": $nap}, redNeuronal);

    if(resultado == 'Emergencia'){
        $('#Modalmensaje').modal('show');
        $('#id').val(control_id);
        
        Swal.fire({
            imageUrl: "https://placeholder.pics/svg/300/8B0000/FFFFFF/EMERGENCIA",
            imageHeight: 300,
            imageAlt: "A tall image"
          });

        
    } else if(resultado == "Rojo"){
        $('#Modalmensaje').modal('show');
        $('#id').val(control_id);
        
        Swal.fire({
            imageUrl: "https://placeholder.pics/svg/300/FF0000/FFFFFF/ALERTA",
            imageHeight: 300,
            imageAlt: "A tall image"
          });
    } else if(resultado == "Naranja"){
        Swal.fire({
            imageUrl: "https://placeholder.pics/svg/300/FF8E16/FFFFFF/EN%20RIESGO",
            imageHeight: 300,
            imageAlt: "A tall image"
          });
    } else {
        Swal.fire({
            imageUrl: "https://placeholder.pics/svg/300/0D9A00/FFFFFF/FAVORABLE",
            imageHeight: 300,
            imageAlt: "A tall image"
          });
    }
    });	

    
}

function iniciarI(control_id){
    const redNeuronal = new brain.NeuralNetwork();

    $.post("../ajax/seguimientos.php?op=NAC", { control_id : control_id }, function(data, status){
        var data = JSON.parse(data);

       const alumnos = data.aaData[0].alumnos;// cantidad de alumnos 
       const ap = data.aaData[0].Aprobados;
       const na = data.aaData[0].Naprobados;

       const $ap = (ap * 100) / alumnos;
       const $nap = (na * 100) / alumnos;

    const datos = [
        {
            "input" : { "Aprobados" : 0.9, "Reprobados" : 0.1 }, //Datos
            "output" : { "verde" : 1} //Salida para mostrar
        }, 
        {
            "input" : { "Aprobados" : 0.8, "Reprobados" : 0.2 }, //Datos
            "output" : { "Naranja" : 1} //Salida para mostrar
        },
        {
            "input" : { "Aprobados" : 0.5, "Reprobados" : 0.5 }, //Datos
            "output" : { "Rojo" : 1} //Salida para mostrar
        },
        {
            "input" : { "Aprobados" : 0.7, "Reprobados" : 0.3 }, //Datos
            "output" : { "Rojo" : 1} //Salida para mostrar
        },
        {
            "input" : { "Aprobados" : 0.4, "Reprobados" : 0.6 }, //Datos
            "output" : { "Emergencia" : 1} //Salida para mostrar
        },
        {
            "input" : { "Aprobados" : 0.2, "Reprobados" : 0.8 }, //Datos
            "output" : { "Emergencia" : 1} //Salida para mostrar
        }
    ];

    redNeuronal.train(datos);

    let resultado = brain.likely({"Aprobados": $ap ,"Reprobados": $nap}, redNeuronal);

    if(resultado == 'Emergencia'){
        Swal.fire({
            imageUrl: "https://placeholder.pics/svg/300/8B0000/FFFFFF/EMERGENCIA",
            imageHeight: 300,
            imageAlt: "A tall image"
          });

        
    } else if(resultado == "Rojo"){
        
        Swal.fire({
            imageUrl: "https://placeholder.pics/svg/300/FF0000/FFFFFF/ALERTA",
            imageHeight: 300,
            imageAlt: "A tall image"
          });
    } else if(resultado == "Naranja"){
        Swal.fire({
            imageUrl: "https://placeholder.pics/svg/300/FF8E16/FFFFFF/EN%20RIESGO",
            imageHeight: 300,
            imageAlt: "A tall image"
          });
    } else {
        Swal.fire({
            imageUrl: "https://placeholder.pics/svg/300/0D9A00/FFFFFF/FAVORABLE",
            imageHeight: 300,
            imageAlt: "A tall image"
          });
    }
    });	

    
}


