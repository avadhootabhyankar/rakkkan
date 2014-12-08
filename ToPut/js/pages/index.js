/**
 * methods page
 */

          ( function( window ) {

'use strict';

var MD = window.MD;
// var $ = window.jQuery;

var heroContainer;
var heroMasonry;
var loadMoreButton;

// --------------------------  -------------------------- //


MD.index = function() {

  // ----- hero ----- //

  ( function() {
    var hero = document.querySelector('#hero');
    heroContainer = hero.querySelector('.hero-masonry');
    heroMasonry = new Masonry( heroContainer, {
      itemSelector: '.hero-item',
      columnWidth: '.grid-sizer'
    });

    getExamples();

  })();

  loadMoreButton = document.querySelector('#load-more-examples');

};


function getExamples() {

  var items = [];
  var fragment = document.createDocumentFragment();
  var data = examplesData;
  for ( var i=0, len = data.length; i < len; i++ ) {
    var item = makeExampleItem( data[i] );
    items.push( item );
    fragment.appendChild( item );
  }

  imagesLoaded( fragment )
    .on( 'progress', function( imgLoad, image ) {
      var item = image.img.parentNode.parentNode;
      // debugger
      // console.dir( image.img.parentNode );
      heroContainer.appendChild( item );
      heroMasonry.appended( item );
    });
}

var examplesData = [
  {
    title: "Product name",
    url: "http://rakuten,co.jp",
    image: "gift.png",
   
  }
];

function makeExampleItem( dataObj ) {
  var item = document.createElement('div');
  item.className = 'hero-item has-example is-hidden';
  var link = document.createElement('a');
  link.href = dataObj.url;
  var p=document.createElement('p');
  p.textContent='Rakuten Card';// Append the text to <button>
  
  var img = document.createElement('img');
  img.src = dataObj.image;
  var title = document.createElement('p');
  title.className = 'example-title';
  title.textContent = dataObj.title;
  link.appendChild( img );
  link.appendChild(p);
  link.appendChild( title );
  item.appendChild( link );

  return item;
}

})( window );
