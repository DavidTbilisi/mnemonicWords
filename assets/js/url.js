export class Url {
    constructor(baseUrl=""){
        this.baseUrl = baseUrl;
    }

    home(){
        return `${location.origin}/${this.baseUrl}`
    }

    arr(one = null){
        let url = location.href.split('/');
        let re = url.splice(3,url.length);
        if (one != null) {
           return re[one];
        }
        return re;
    }

    has(word){
        if (this.home().search(word) > -1) {
            return true;
        }
        return false;
    }



}