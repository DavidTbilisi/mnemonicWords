export class Url {
    constructor(baseUrl=""){
        this.baseUrl = baseUrl;
    }

    home(){
        return `${location.origin}/${this.baseUrl}`
    }

    urlArr(){
        let url = this.home().split('/');
        return url.splice(3,url.length);
    }
    fullUrlArr(){
        let url = this.home().split('/');
        return url;
    }

    has(word){
        if (this.home().search(word) > -1) {
            return true;
        }
        return false;
    }



}