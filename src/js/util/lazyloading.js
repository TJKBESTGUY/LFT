
import "lazysizes/plugins/unveilhooks/ls.unveilhooks";
import 'lazysizes';


window.lazySizesConfig = window.lazySizesConfig || {};

lazySizesConfig.preloadAfterLoad = true;
lazySizesConfig.expand = 1000;

document.addEventListener('lazyloaded', function(e){

console.log("lazyyy");

});

document.addEventListener('lazybeforeunveil', function(e){
    var bg = e.target.getAttribute('data-bg');
    if(bg){
        e.target.style.backgroundImage = 'url(' + bg + ')';
    }
});

console.log("lazyload active");
