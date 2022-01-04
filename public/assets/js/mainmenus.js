( function () {

    'use strict';
    var i = 0;
    
    var contents = document.getElementById( 'contents' );
    var files = document.getElementById( 'files' );
    var links = document.getElementById( 'links' );
    var category = document.getElementById( 'category' );

    contents.style.display = 'none';
    files.style.display = 'none';
    links.style.display = 'none';

    function categoryOnChange(){
        var data = category.value;
        console.log("Harusya dijalankan " + i++ + ": "+ data);
        files.style.display = 'none';
        links.style.display = 'none';
        contents.style.display = 'none';
        document.getElementById( data + "s" ).style.display = 'block';
    }
    if (category.value != "") {
        categoryOnChange();
    } 
    
    category.addEventListener( 'change', categoryOnChange );
        
})();