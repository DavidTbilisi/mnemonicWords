/**
 * Created by david on 8/26/2018.
 */

var david = (function () {

    var view = (function(){

        return {
            edit:$('.edit'),
            classEditable:'editable',
            openNav:$('.open-nav span'),
            closeNav:$('.closebtn'),
            sideNav:$('.sidenav'),
        }
    })();

    var octopus = (function(v){
        function toggleEditable(e) {
            e.preventDefault();
            var obj = {};
            var target = $(e.target);
            var parent = $(target).parent().parent();
            var siblings = $(parent).siblings();

            siblings.each(function (index,element){
                if ($(element).hasClass(v.classEditable)) {

                    if($(element).attr('contentEditable')) {
                        $(element).removeAttr('contentEditable');
                    } else {
                        $(element).attr('contentEditable','true');
                    }

                    var classname = $(element).attr('class');
                        classname =  classname.split(' ')[0];
                    obj[classname] = $(element).text();
                }
            });

            return obj;
        }
        function edit (obj){
            console.log(obj);
            $.post('index.php/edit/'+obj.id, obj).done(function (d) {
                console.log(d);
            });
        }

        v.edit.on('click',function (e) {
          var obj1 = toggleEditable(e);
            edit(obj1);
        });


        return {}
    })(view);

    return {view:view,octopus:octopus}
})();
