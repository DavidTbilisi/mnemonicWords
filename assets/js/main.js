/**
 * Created by david on 8/26/2018.
 */
import 'bootstrap/dist/js/bootstrap.bundle.min';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'codemirror/lib/codemirror.css';
import 'codemirror/theme/monokai.css';
import 'codemirror';
import 'codemirror/mode/xml/xml';
import 'jquery';
import 'hammerjs';
import 'webpack-jquery-ui/draggable';
import '../css/main.scss';
import {Swal} from 'sweetalert2';


require('./hammerJquery');
import {Ajax} from './Ajax';
import {Dom} from './dom';
import {Url} from './url';
import {Funcs} from './Funcs';

import 'summernote';
let dom = new Dom();
let swal = require("sweetalert2");
dom.jkscroll(200, 'off');
let f = new Funcs();
// setting up host;
let url;
let bool = location.href.search('localhost') > -1;
if (bool) {
    url = location.href.search('dictionary') > -1?new Url('dictionary/index.php'):new Url('mnemonicWords/index.php');
} else {
    url = new Url('learnwords/index.php');

}


global.david = (function () {
    let view = (function () {

        return {
            editWord: '.edit-word',
            loadMore: '.load_more',
            modal: '#exampleModal',
            search: 'nav input[type=text]',
            delete: '.delete-word',
            det_save:'.det-save',
        }
    })();

    let octopus = (function (v) {

        function makeEditBtns() {
            "use strict";
             $(document).find('.words-mobile ul').draggable({
                 axis: "x",
                spanMode:'both',
                drag: function(event, ui) {
                     // console.log(event);
                     // console.log(ui);
                     // console.log(ui.position.left);

                    let element = dom.nthParent(this, 3);

                    if (ui.position.left < -20) {
                        $(element).find('.covered').addClass('revield');
                        // ლიმიტი მარცხნივ გაწევაზე
                        ui.position.left = Math.max( -60, ui.position.left );
                        //     ui.position.left = -60;
                    } else if (ui.position.left > -10 ) {
                        $(element).find('.covered').removeClass('revield');
                        // ლიმიტი მარჯვნივ გაწევაზე
                        ui.position.left = Math.min( 0, ui.position.left );
                        // ui.position.left = -0;

                    }

                }
             })

        }

        function confirmDelete(e) {
            "use strict";
            e.preventDefault();
            swal({
                title: 'დარწმუნებული ხართ რომ გინდათ ამ სიტყვის წაშლა?',
                text: "სიტყვის დაბრუნება შეუძლებელი იქნება",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'დარწმუნებული ვარ',
                cancelButtonText: 'გაუქმება'
            }).then((result) => {
                if (result.value) {
                    
                    let href = e.target.href;
                    let deleteWord = new Ajax({url:href});
                    deleteWord.ok.then((d) => {
                        showSearchResult(d, 'replaceWith');
                    });
                    deleteWord.ok.catch((err) => {
                        return err
                    });
                    swal(
                        'სიტყვა წაიშალა!',
                        '',
                        'success'
                    )
                }
            })
        }

        function showEditWordModal(e) {
            "use strict";
            let target = e.target;
            let parent = dom.nthParent(target, 2);
            let id = $(parent[0]).data('id');
            console.log(parent, id );
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
                $('.words-mobile').append(rows.slice(1, rows.length));
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
            $('.details textarea').summernote({
                dialogsInBody: true,
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                height:150,
                popover: {
                    air: [
                        ['color', ['color']],
                        ['font', ['bold', 'underline', 'clear']]
                    ]
                },
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ],

                ]
            });

        }
        init();

        $(document).on('click', v.editWord, function (e) {
            e.preventDefault();
            showEditWordModal(e);
        });

        $(document).on('keyup', v.search, function () {

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

        $(document).on('click', v.delete, function (e) {
            confirmDelete(e);
        });

        $(document).on('click', v.det_save, function (e) {
            e.preventDefault();

           let saveDetails = new Ajax({
               url:`${url.home()}/detailsSave/${url.arr(2)}`,
               data:{
                   text: $('.details textarea').summernote('code'),
                   words_id: url.arr(2)
               },
               method:'post'
           });


           saveDetails.ok.then(function(data){
               console.log(data);
               $('.details textarea').summernote('destroy');
               init();
           }).catch(function (err) {
               console.log(err)
           })

        });

        return {dom, Ajax}
    })(view);

    return {view, octopus, f, Funcs, url, dom}
})();