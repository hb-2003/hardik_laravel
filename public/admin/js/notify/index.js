'use strict';
var notify = $.notify('<i class="fa fa-bell-o"></i><strong>Loading</strong> page Do not close this page...', {
    type: 'theme',
    allow_dismiss: true,
    delay: 3000,
    showProgressbar: true,
    timer: 100,
    animate:{
        enter:'animated fadeInDown',
        exit:'animated fadeOutUp'
    }
});
$.notify({
    // options
    message: 'Hello World'
},{
    // settings
    type: 'danger'
});
/*
setTimeout(function() {
    notify.update('message', '<i class="fa fa-bell-o"></i><strong>Loading</strong> Inner Data.');
}, 1000);
*/
