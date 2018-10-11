;export class Ajax {


    constructor(obj) {
        let dis;
        var sendData;
        obj = obj == undefined ? {} : obj;
        this.req = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        this.method = obj.method || "GET";
        this.url = obj.url || 'https://jsonplaceholder.typicode.com/todos/1';
        this.isSync = obj.isSync === undefined ? '' : obj.isSync;
        this.data = obj.data === undefined ? "" : obj.data;
        this.headers = obj.headers === undefined ? '' : obj.headers;
        dis = this;
        this.ok = new Promise(function (resolve, reject) {
            function setHeaders(req) {
                if (dis.headers != '') {
                    Object.keys(dis.headers).forEach(function (p1) {
                        req.setRequestHeader(p1 + '', dis.headers[p1] + '');
                    })
                }
            }

            function dataConverted() {
                 sendData = dis.method == 'POST' || dis.method == 'post' ? '' : '?';
                Object.keys(dis.data).forEach(function (p1) {
                    sendData += p1 + "=" + dis.data[p1] + "&";
                });
                return sendData = sendData.slice(0, -1);
            }

            // set handler;
            dis.req.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    try {
                        var response = this.responseText;
                    } catch (e) {
                        console.warn(e);
                    }
                    resolve(response);
                    reject(dis.req.status)
                }
            };

            // send request
            if (dis.method == "POST" || dis.method == 'post') {
                dis.req.open(dis.method, dis.url, true);
                setHeaders(dis.req);
                dis.req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                dis.req.send(dataConverted());
            } else {
                if (dis.data != undefined && dis.data != '' && dis.data != null) {
                    sendData = '' || dataConverted();
                } else {
                    sendData = '';
                }
                dis.req.open(dis.method, dis.url + sendData, true);
                setHeaders(dis.req);
                dis.req.send(sendData);
            }
        });
    }
}