/**
 * Created by david on 10/17/2018.
 */
export class Funcs {
    rand(min=0, max=10) {
        return Math.floor(Math.random()*(max-min)+min);
    }

    loop(obj = {}, callback) {

        obj.from = obj.from === undefined? 0: obj.from;
        obj.place = obj.place === undefined? 9: obj.place;
        obj.step = obj.step === undefined? 1: obj.step;


        for(let i = obj.from; i <= obj.place; i+=obj.step) {
            callback(i);
        }
    }






}