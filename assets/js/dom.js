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
    $(selector, only = true){
            let el = document.querySelectorAll(selector);
        if(el.length > 1 && !only) {
            return el;
        }
        return document.querySelector(selector);
}


    getSelectedText() {
        if (window.getSelection()) {
            return window.getSelection().toString();
        } else if (document.selection) {
            return document.selection.createRange().text;
        }
        return '';
    }

    jkscroll(jump = 100, scroll='on'){
        if(scroll !== 'off'){
            let position = window.scrollY || window.scrollTop || document.getElementsByTagName("html")[0].scrollTop;
            window.addEventListener('keyup', function (e) {
                if (e.keyCode === 74){
                    window.scrollTo({
                        top: (position+=jump),
                        behavior: "smooth"
                    });
                } else if (e.keyCode === 75){
                    window.scrollTo({
                        top: (position-=jump),
                        behavior: "smooth"
                    });
                }
            })
        }
    } // end jkscroll


    create(obj = {pos,place,el}){
        obj.pos = obj.pos === undefined?1:obj.pos;

        switch (obj.pos){
            case 1:
                obj.pos = 'beforebegin';
                break;
            case 2:
                obj.pos = 'afterbegin';
                break;
            case 3:
                obj.pos = 'beforeend';
                break;
            case 4:
                obj.pos = 'afterend';
                break;
        }
        obj.place = obj.place === undefined?this.$('h1')||this.$('div')||this.$("body"):obj.place;
        obj.el = obj.el === undefined?"<h1>You Have To Write Some Text</h1>":obj.el;
        obj.place.insertAdjacentHTML(obj.pos,obj.el);
    }



}