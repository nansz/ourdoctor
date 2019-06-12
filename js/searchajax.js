var kinput = document.getElementById('kinput');
kinput.onkeyup = handle;
//= kinput.onkeyup = kinput.onkeypress =
function handle() {

    $('.input-wrap').parent().addClass('has-focused');
    let user_login = $('#kinput').val();

            var myList = document.getElementById('resultsz');
            myList.innerHTML = '';
            $.ajax({
                url: 'index.php?route=product/search_ajax',
                dataType: 'json',
                data: {
                    search: user_login,
                },
                success: function(json ) {
                    // console.log(json);

                    if(json['error']){
                        var ul = document.getElementById("resultsz");
                        var li = document.createElement("li");
                        li.className='results__item';
                        li.appendChild(document.createTextNode(json['error']));
                        ul.appendChild(li);
                    } else {

                    Object.size = function(obj) {
                        var size = 0, key;
                        for (key in obj) {
                            if (obj.hasOwnProperty(key)) size++;
                        }
                        return size;
                    };


                    // Get the size of an object
                    var size = Object.size(json);
                    for (var i=0; i<size; i++) {
                        var ul = document.getElementById("resultsz");
                        var li = document.createElement("li");
                        li.className='results__item';
                        li.id='li'+i;
                        // var liz = document.getElementById(li.id);
                        var a = document.createElement("a");
                                a.href=json[i]['href'];
                        // console.log(liz);
                        // console.log(a);
                                console.log( a.href);
                                a.appendChild(document.createTextNode(json[i]['name']));
                        // liz.appendChild(a);
                        li.appendChild(a);
                        ul.appendChild(li);
                    }
                     // var resultsz=  document.getElementById('resultsz');
                    }
                }
                });

}