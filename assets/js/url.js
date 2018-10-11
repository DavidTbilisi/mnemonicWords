export class Url {
    constructor(baseUrl=""){
        this.baseUrl = baseUrl;
    }

    home (){
        return `${location.origin}/${this.baseUrl}`
    }

}