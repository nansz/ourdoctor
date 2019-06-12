var button_more = true; // наличие кнопки "загрузить ещё"
var window_height = 0; // высота окна
var product_block_offset = 0; // отступ от верха окна блока, содержащего контейнеры
var product_block = ''; // определяет div, содержащий товары
var pages_count = 0; // счетчик массива ссылок пагинации
var pages = []; // массив для ссылок пагинации
var waiting = false;

function getNextProductPage() {
    if (waiting) return;
    if (pages_count >= pages.length) return;
    waiting = true;
    $.ajax({
        url:pages[pages_count],
        type:"GET",
        data:'',
        success:function (data) {
            $data = $(data);
            $('#ajax_loader').remove();
            if ($data) {
                $(product_block).append($data.find('.blog__item').parent().html());/*ищем нужный блок с товаром или статьей для добавления в наш блок*/
                $('.box-pagination').html($data.find('.paginationz')); /*показывает на какой мы странице в пагинации. обращаемся к классу который стоит выше над классом пагинации ( можно конечно и на сам клас погинации обращаться но тогда он делает копию самого себя) */
                $('script').each(function(){eval($(this).text())});
            }
            waiting = false;
        }
    });
    pages_count++;
    if (pages_count >= pages.length) {$('.load_more').hide();};

}



function getProductBlock() {
    // if ($('.product-wrapper').length > 0) {
    //     product_block = '.product-wrapper ';
    // } else {
    //     product_block = '.product-grid';
    // }
    product_block='.blog';
    return product_block;
}

$(document).ready(function(){
    var TotalPages=0;
    window_height = $(window).height();
    product_block = getProductBlock();
    var button_more_block ="<button type=\"button\" class=\"load_more more-btn\" >swome more</button>\n"; //

    $('.pagination').each(function(){
        href = $(this).find('li:last a').attr('href');
         TotalPages = href.substring(href.indexOf("page=")+5);
            First_index = $(this).find('li.pagination__item.is-active span').html();
        console.log(TotalPages);
        console.log(First_index);
        i = parseInt(First_index) + 1;
        while (i <= TotalPages) {
            pages.push(href.substring(0,href.indexOf("page=")+5) + i);
            i++;
        }
        console.log(pages);
    });


if (pages>2) {
    if (button_more) {
        console.log("button_more!");
        $('.buttonshowmore').before(button_more_block);

        $('.load_more').click( function(event) {
            event.preventDefault();
            getNextProductPage();
        });
    } else {
        $('.paginationz').parent().parent().hide();
        $(window).scroll(function(){
            product_block = getProductBlock();
            product_block_height = $(product_block).parent().height();
            if (pages.length > 0) {
                if((product_block_offset+product_block_height-window_height)<($(this).scrollTop())){
                    getNextProductPage();
                }
            }
        });
    }
    }

});