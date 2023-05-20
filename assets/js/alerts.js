function alertSimple(msj,title){
    bootbox.alert({
        title: title,
        centerVertical: true,
        message: msj,
        });
}

function alertQuestion(msj){
    bootbox.confirm({
        title: 'Confirmación',
        message: msj,
        buttons: {
        confirm: {
        label: 'Yes',
        className: 'btn-success'
        },
        cancel: {
        label: 'No',
        className: 'btn-danger'
        }
        },
        callback: function (result) {
            if(result){

                loader();
            }
        }
        });
}

function loader(){
    let dialog = bootbox.dialog({
        message: '<img width="36px" src="./assets/img/loader.gif"> Loading...</div>',
        closeButton: false
        });

        dialog.modal('hide');
}


