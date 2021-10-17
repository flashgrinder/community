import Instafeed from 'instafeed.js';


// let feed = new Instafeed({
//     limit: 4,
//     template: '<a href="{{link}}"><img title="{{caption}}" src="{{image}}" /></a>',
//     target: 'instafeed',
//     accessToken: 'your-token'
// });

function init() {

fetch('https://ig.instant-tokens.com/users/bc4339ba-6e2d-4a4b-bfe1-dcbf8efaec6a/instagram/17841407146434748/token.js?userSecret=wsvfhvo068jqtr51qqtie')
  .then(resp => resp.json())
  .then(data => {
        let feed = new Instafeed({
            accessToken: data.Token,
            target: 'instafeed',
            limit: 4,
            template: '<a href="{{link}}"><img class="image__img  pulse1" title="{{caption}}" src="{{image}}" /><div class="image__overlay"><div class="image__title">{{caption}}</div></div></a>',
        });
        feed.run();
    });

    // console.log('Instafeed work')
    // feed.run();

}

export default { init }