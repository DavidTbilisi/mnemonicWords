/**
 * Created by david on 8/26/2018.
 */
import 'jquery';
import 'hammerjs';
import '../css/main.scss';
require('./hammerJquery');
import {Ajax} from './Ajax';
import {Dom} from './dom';
import {Url} from './url';
import {Funcs} from './Funcs';
let dom = new Dom();
dom.jkscroll(200, 'off');
let f = new Funcs();
// setting up host;
let url;
let bool = location.href.search('localhost') > -1;
if (bool) {
    url = new Url('mnemonicWords/index.php');
} else {
    url = new Url('learnwords/index.php');

}


global.david = (function () {
    let view = (function () {

        return {
            editWord        : '.edit-word',
            loadMore        : '.load_more',
            modal           : '#exampleModal',
            search          : 'nav input[type=text]',
        }
    })();

    let octopus = (function (v) {

        function makeEditBtns() {
            "use strict";
            $(document).find('ul').hammer().bind("swipeleft swiperight", function (e) {
                let element = dom.nthParent(this, 2);
                console.log(e.gesture.center, e.gesture.distance);


                if (e.type === 'swipeleft' && e.gesture.distance > 30) {
                    $(element).find('.covered').addClass('revield');
                } else if (e.type === 'swiperight' && e.gesture.distance > 30) {
                    $(element).find('.covered').removeClass('revield');
                } else {
                    console.log(e.type)
                }
            });
        }
/* todo:confirm delete */
        function confirmDelete (e) {
            "use strict";
            e.preventDefault();
        }

        function showEditWordModal(e) {
            "use strict";
            let target = e.target;
            let id = $(dom.nthParent(target, 2)[1]).data('id');
            console.log(id);
            let actionPath = `${url.home()}/save/${id}`;
            let formAction = $(v.modal).find('form')[0];
            let path = `${url.home()}/welcome/wordsJson/${id}`;

            let ajax = new Ajax({url: path});

            ajax.ok.then(data => {
                let word = JSON.parse(data);
                $(formAction).attr('action', actionPath);
                $(v.modal).prepend(`<input hidden type="text" name="id" value="${word.id}">`);
                $(v.modal).find('.modal-title').text('შეცვალე სიტყვები');
                $(v.modal).find('input[name=newWord]').val(word.newWord);
                $(v.modal).find('input[name=assoc]').val(word.assoc);
                $(v.modal).find('input[name=connection]').val(word.connection);
                $(v.modal).find('input[name=meaning]').val(word.meaning);
            }).catch(err => console.log(err))
        }

        function showSearchResult(data, action = 'replaceWith') {
            if (action === "replaceWith") {
                $('.words-mobile').replaceWith($(data).find('.words-mobile'))
            } else if (action === "append") {
                let rows = $(data).find('.words-mobile').children('.row');
                $('.words-mobile').append(rows.slice(1,rows.length));
            }
            makeEditBtns();
        }


        let limit = 10, start = 10;

        function loadMore() {

            let ajax = new Ajax({
                url: `${url.home()}/`,
                method: 'post',
                data: {
                    start: start,
                    limit: limit
                }
            });

            ajax.ok.then((data) => {
                "use strict";
                start += limit;
                showSearchResult(data, 'append');

            })

        }


        function update() {
            "use strict";
            $(document).ready(function () {

                makeEditBtns();

                $(document).find('.edit-word').on('click', function (e) {
                    e.preventDefault();
                    showEditWordModal(e);
                });
            })


        }

        function init() {
            "use strict";
            makeEditBtns();
        }


        $(document).on('click', v.editWord, function (e) {
            e.preventDefault();
            showEditWordModal(e);
        });


        init();

        $(document).on('keyup',v.search, function () {

            let ajax = new Ajax({
                url: `${url.home()}/welcome/searchResult/`,
                data: {search: $(v.search).val()},
                method: "post"
            });


            ajax.ok.then(d => {
                showSearchResult(d)
            }).catch(err => console.log(err))

        });


        $(document).on('click', v.loadMore, function () {
            loadMore();
        });


        return {dom, Ajax}
    })(view);

    return {view, octopus, f, Funcs, url, dom}
})();