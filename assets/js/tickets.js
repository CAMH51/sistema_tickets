
 const addTicket =()=>{
    let inputDoc = document.getElementById('evidencia[]');
    let form = document.formTicket;
    let formData = new FormData(form);


    if(!validarForm()){
        alertSimple('Favor de Ingresar Todos los Datos Requeridos!!',"Alerta")
    }else{
        var imageASubir = inputDoc.files;
        console.log(imageASubir.length);
    
        for(var archivo of imageASubir){
            formData.append("doc",archivo );
        }
        
            axios({
                method: 'post',
                url: './controllers/agregar.controller.php?o=addticket',
                data: formData,
              
              })
                .then(function (response) {
                 console.log(response.data);   
        
                });
    }
    
}


 function validarForm(){
    let form = document.formTicket;


    if(form.txtsolicita.value == ""){
        form.txtsolicita.style.border = "solid 1px red";
        return false;
    }else{
        form.txtsolicita.style.border = "solid 1px gray";
    }
  
    
    if(form.txtasunto.value == ""){
        form.txtasunto.style.border = "solid 1px red";
        return false;
    }else{
        form.txtasunto.style.border = "solid 1px gray";
    }

        
    if(form.arearequiriente.value == ""){
        form.arearequiriente.style.border = "solid 1px red";
        return false;
    }else{
        form.arearequiriente.style.border = "solid 1px gray";
    }

    if(form.usuariorequiriente.value == ""){
        form.usuariorequiriente.style.border = "solid 1px red";
        return false;
    }else{
        form.usuariorequiriente.style.border = "solid 1px gray";
    }

    if(form.entidad.value == ""){
        form.entidad.style.border = "solid 1px red";
        return false;
    }else{
        form.entidad.style.border = "solid 1px gray";
    }

    if(form.fechasolicitud.value == ""){
        form.fechasolicitud.style.border = "solid 1px red";
        return false;
    }else{
        form.fechasolicitud.style.border = "solid 1px gray";
    }

    if(form.prioridad.value == ""){
        form.prioridad.style.border = "solid 1px red";
        return false;
    }else{
        form.prioridad.style.border = "solid 1px gray";
    }

    if(form.sistema.value == ""){
        form.sistema.style.border = "solid 1px red";
        return false;
    }else{
        form.sistema.style.border = "solid 1px gray";
    }

    if(form.txtdescripcion.value == ""){
        form.txtdescripcion.style.border = "solid 1px red";
        return false;
    }else{
        form.txtdescripcion.style.border = "solid 1px gray";
    }

return true
}

function getAllTickets(){
    axios({
        method: 'get',
        url: './controllers/consultas.controller.php?o=getAllTicket'      
      })
        .then(function (response) {
         console.log(response.data);   

        });
}

function modalSeguimiento(id_seguimiento){
let inputSeguimiento = document.getElementById('id_seguimiento');
inputSeguimiento.value=id_seguimiento;
$('#exampleModal2').modal('show');
}

