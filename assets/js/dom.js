export class Dom {


nthParent(element, len) {
    "use strict";
    let array = [];
    let leng = len === undefined ? 10 : len;
    let el = typeof element === 'object' ? element :
        document.querySelector(element);
    if (array.length === 0){array.push(el.parentElement)}
    while(array[array.length-1].parentElement && array.length < leng) {
        array.push(array[array.length-1].parentElement);
    }
    return array;
}


waitFor(el, callback) {
    'use strict';
    let counter = 0;
    let interval = setInterval(function () {
        counter++;
        let element = document.querySelector(el);
        if (element){
            clearInterval(interval);
            callback(element)
        }
        if (counter > 40) {
            clearInterval(interval);
            console.log('element not found');
        }
    })
}



    getSelectedText() {
    if (window.getSelection()) {
        return window.getSelection().toString();
    } else if (document.selection) {
        return document.selection.createRange().text;
    }
    return '';
}

}