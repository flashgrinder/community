jQuery(function($){
    $('#loadmore-news').click(function(){
        $(this).text('Загрузка...');
        var data = {
            'action': 'loadmore_news',
            'query': posts_vars,
            'page' : current_page
        };
        $.ajax({
            url:ajaxurl,
            data:data,
            type:'POST',
            success:function(data){
                if(data) {
                    $('#loadmore-news').text('Показать ещё');
                    $('#articles-posts').append(data);
                    const container = document.querySelector('#articles-posts');
                    window.revealInit(container);
                    current_page++;
                    if (current_page == max_pages) $("#loadmore-news").remove();
                } else {
                    $('#loadmore-news').remove();
                }
            }
        });
    });

    $('#loadmore-gallery').click(function(){
        $(this).text('Загрузка...');
        var data = {
            'action': 'loadmore_gallery',
            'query': posts_vars,
            'page' : current_page
        };
        $.ajax({
            url:ajaxurl,
            data:data,
            type:'POST',
            success:function(data){
                if(data) {
                    $('#loadmore-gallery').text('Показать ещё');
                    $('#gallery-posts').append(data);
                    const container = document.querySelector('#gallery-posts');
                    window.revealInit(container);
                    current_page++;
                    if (current_page == max_pages) $("#loadmore-gallery").remove();
                } else {
                    $('#loadmore-gallery').remove();
                }
            }
        });
    });

    $('#loadmore-artist').click(function(){
        $(this).text('Загрузка...');
        var data = {
            'action': 'loadmore_artist',
            'query': posts_vars,
            'page' : current_page
        };
        $.ajax({
            url:ajaxurl,
            data:data,
            type:'POST',
            success:function(data){
                if(data) {
                    $('#loadmore-artist').text('Показать ещё');
                    $('#artist-posts').append(data);
                    current_page++;
                    if (current_page == max_pages) $("#loadmore-artist").remove();
                } else {
                    $('#loadmore-artist').remove();
                }
            }
        });
    });
});