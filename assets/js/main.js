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


global.sharedData = {
  name: 'from vue js',
    words:''
};


global.v = new Vue({
   el:"#root",
    data:{
       sharedData,
        limit:10,
        start:0,
        modal:{
            title:`vue title `,
            newWord:``,
            assoc:``,
            connection:``,
            meaning:``,
            url:``,
        },
    },
    methods: {
        makeEditBtns:function () {
            $(document).find('.words-mobile ul').draggable({
                axis: "x",
                spanMode:'both',
                drag: function(event, ui) {
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
            });
            console.log('edit buttons baked');
        },
        confirmDelete:function (e) {
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
                        this.getWords();
                        this.update();

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

        },
        showEditWordModal:function (e,id) {
            let path = `${url.home()}/welcome/wordJson/${id}`;
            this.modal.url = id;
            let ajax = new Ajax({url: path});
            ajax.ok.then(data => {
                "use strict";
                let word = JSON.parse(data);
                this.modal.newWord = word.newWord;
                this.modal.assoc = word.assoc;
                this.modal.connection = word.connection;
                this.modal.meaning = word.meaning;
            }).catch(err => console.log(err));

},
        loadMore:function () {
                this.limit+=10;
                this.getWords();
        },
        addWord:function() {
            "use strict";
            this.modal = {
                title:`add `,
                newWord:``,
                assoc:``,
                connection:``,
                meaning:``,
                url:``,
            }
        },
        getWords:function () {
            "use strict";
            let ajax = new Ajax({
                url: `${url.home()}/welcome/wordsJson/${this.start}/${this.limit}`,
            });

            ajax.ok.then((data)=>{
                this.sharedData.words = JSON.parse(data) ;
                this.update();
            }).catch((err)=>{
                console.log(err)
            });

        },
        update:function () {
            this.$forceUpdate();
            setTimeout(()=>{
                this.makeEditBtns();
            },1e2)
        },
        summernote:function () {
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
    },
    created:function (){
        "use strict";
        console.log('created');
    },
    mounted:function() {
        "use strict";
        console.log('mounted');
        this.getWords();
        this.summernote();
    }
});