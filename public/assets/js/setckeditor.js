
( function () {
    'use strict'

    var content = document.getElementById('content');

    
    CKEDITOR.replace(content, {
        language: 'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
    console.log("Hello");

})()