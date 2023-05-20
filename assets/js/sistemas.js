function getAllSistem(){
    axios({
        method: 'get',
        url: './controllers/consultas.controller.php?o=getAllSistem'      
      })
        .then(function (response) {
         console.log(response.data);   

        });
}

function datosPaginacion(totalResgitros,itemxpagina,numPagina){
  let tabla = document.getElementById('Tsistema');
  let html = "";
  axios({
    method: 'get',
    url: './controllers/consultas.controller.php?o=systemPagination'+'&t='+totalResgitros+'&ixp='+itemxpagina+'&n='+numPagina,
  
  })
    .then(function (response) {
     console.log(response.data);
    if(response.data[0].status == false){
      html=html+'No existen registros.'
      tabla.innerHTML=html;
   }else{
    for(let i=0;i<response.data.length;i++){
      html=html+'<tr>';
      html=html+'<td>'+response.data[i].id_sistema+'</td>';
      html=html+'<td>'+response.data[i].descrip_sistema+'</td>';
      html=html+'<td>'+response.data[i].gestor+'</td>';
      html=html+'<td>'+response.data[i].nombre_usuario+'</td>';
      html=html+'<td><a href="#" onclick="alertQuestion(\'¿Desea Eliminar el Sistema?\')" ><img src="./assets/img/eliminar.gif" width="32px"></a></td>';
      html=html+'<td><a><img src="./assets/img/editar.gif" width="32px"></a></td>';

      html=html+'</tr>';
    }
    tabla.innerHTML=html;

    pintarPaginacion(response.data[0].paginas,totalResgitros,itemxpagina);
  
   } 
    });
  }

  function pintarPaginacion(paginas,totalResgitros,itemxpagina){
    let paginacion = document.getElementById('paginacion');
    let html2 = "";

    html2=html2+'<ul class="pagination ">';
    for (let index = 1; index <= paginas; index++) {
     html2=html2+'<li class="page-item"><a class="page-link" onclick="datosPaginacion('+totalResgitros+','+itemxpagina+','+index+')">'+index+'</a></li>';
    }
    html2=html2+'</ul>';
    paginacion.innerHTML=html2;
  }
