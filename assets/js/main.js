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
let url = new Url('mnemonicWords/index.php');
let dom = new Dom();
global.david = (function () {
    let view = (function () {

        return {
            editWord: $('.edit-word'),
            classEditable: 'editable',
            openNav: $('.open-nav span'),
            closeNav: $('.closebtn'),
            sideNav: $('.sidenav'),
            modal: $('#exampleModal'),
            search: $('nav input[type=text]'),
        }
    })();

    let octopus = (function (v) {


        function edit(obj) {
            console.log(obj);
            $.post('index.php/edit/' + obj.id, obj).done(function (d) {
                console.log(d);
            });
        }


        function searchResult(data) {
              $('.words-mobile').replaceWith( $(data).find('.words-mobile') )
        }

        $(v.editWord).on('click', function (e) {
            e.preventDefault();
            let target = e.target;
            let id = $(dom.nthParent(target, 2)[1]).data('id');

            let path = `${url.home()}/welcome/wordsJson/${id}`;
            let actionPath = `${url.home()}/save/${id}`;
            let formAction = dom.nthParent(v.modal[0], 1)[0];

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

        });

        $('ul').hammer().bind("panleft panright", function (e) {
            let element = dom.nthParent(this, 2);
            // d.l(element, e.type, e.gesture.center.y);
            if (e.type == 'panleft') {
                $(element).find('.covered').addClass('revield');
            } else if (e.type == 'panright') {
                $(element).find('.covered').removeClass('revield');
            }
        });

        v.search.on('keyup', function () {
            let ajax = new Ajax({
                url: `${url.home()}/welcome/searchResult/`,
                data: {search: v.search.val()},
                method: "post"
            });
            ajax.ok.then(d => {
                searchResult(d)

            })
                .catch(err => console.log(err))

        });

        return {dom, Ajax}
    })(view);

    return {view, octopus, Ajax}
})()