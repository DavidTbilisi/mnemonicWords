/**
 * Created by david on 10/17/2018.
 */
export class Array {

    arrRemove(arr, value) {

        return arr.filter(function(ele){
            return ele != value;
        });
    }


    randFrom(array) {
        return array[Math.floor(Math.random() * array.length)];
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