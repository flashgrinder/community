import Instafeed from 'instafeed.js';

function init() {

    fetch('https://ig.instant-tokens.com/users/bc4339ba-6e2d-4a4b-bfe1-dcbf8efaec6a/instagram/17841449477240552/token?userSecret=6f4ecubv6cl7qunjmfkaz')
    .then(resp => resp.json())
    .then(data => {
            let feed = new Instafeed({
                accessToken: data.Token,
                target: 'instafeed',
                limit: 4,
                template: '<a class="instafeed__link" href="{{link}}" target="_blank"><img class="instafeed__img" title="{{caption}}" src="{{image}}" /><div class="instafeed__overlay"><div class="instafeed__title">{{tagged}}</div></div></a>',
            });

            feed.run();

        });

}

export default { init }