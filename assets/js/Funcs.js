/**
 * Created by david on 10/17/2018.
 */
export class Funcs {
    rand(min=0, max=10) {
        return Math.floor(Math.random()*(max-min)+min);
    }
    randFrom(array) {
        return array[Math.floor(Math.random() * array.length)];
    }
    loop(obj = {}, callback) {

        obj.from = obj.from === undefined? 0: obj.from;
        obj.to = obj.to === undefined? 9: obj.to;
        obj.step = obj.step === undefined? 1: obj.step;


        for(let i = obj.from; i <= obj.to; i+=obj.step) {
            callback(i);
        }
    }

    min(array) {
        return Math.min.apply(Math,array);
    }

    max(array) {
        return Math.max.apply(Math,array);
    }
    range(obj){

        let array = [];

        this.loop(obj, function (i) {
            array.push(i);
        });

        return array;
    }




}