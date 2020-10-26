/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    // el: '#app',
});

//*************************************************************************
//********************* ALGOLIA SEARCH ***************************
import algoliasearch from 'algoliasearch';

const client = algoliasearch(
  'LIKNMZQ86D',
  '0c94464660cf89fcf35226a37144afbf'
);
//
const index = client.initIndex('myApartments');
// index.search('', {
//   aroundLatLng: [-36.940696, -106.64684],
//   aroundRadius: 2000000, // 1km
//   hitsPerPage: 20
// }).then(({ hits }) => {
//   console.log(hits);
// });

//*************************************************************************
//********************* END ALGOLIA SEARCH ***************************

//***************************************** AUTOCOMPLETE + SEARCH + SLIDER *****************************************************
var ltlgAR = [];

(function() {
  var placesAutoComplete = places({
    appid: 'LIKNMZQ86D',
    apiKey: '0cc1b52fd7eedcbbe8ac54b818b413fb',
    container: document.querySelector('#address'),
    // aroundRadius: 20000,
    // aroundLatLng: '41.89193, 12.51133',
    template: {
      value: function(suggestion) {
        return suggestion.name;
      }
    }
  }).configure({
    type: 'address'
  });


  placesAutoComplete.on('change', function resultSelected(e) {
    //
    document.querySelector('#state').value = e.suggestion.administrative || '';
    document.querySelector('#city').value = e.suggestion.city || '';
    document.querySelector('#postcode').value = e.suggestion.postcode || '';
    var ltlg = e.suggestion.latlng || '';
    ltlgAR.length = 0;
    ltlgAR.push(ltlg['lat'], ltlg['lng']);
    console.log(ltlg['lat'], ltlg['lng']);

    index.search('', {
      aroundLatLng: [ltlg['lat'], ltlg['lng']],
      aroundRadius: slider.val(),
      hitsPerPage: 20
    }).then(({ hits }) => {
      $('#myAlgoliaResults').html('');

      for (var i = 0; i < hits.length; i++) {
        $('#myAlgoliaResults').append(
            '<li>'
          + hits[i]['city']
          + '</li>'
        );
      }
      // console.log(hits);
    });
  })
})();

//********************* CLEAR ALL ***************************

$("#address").keyup(function() {
  if(!($('#address').val())){
    $('#myAlgoliaResults').html('');
    $('#state').val('');
    $('#city').val('');
    $('#postcode').val('');
  }
});

$('.ap-input-icon.ap-icon-clear').on('click', function() {
  $('#myAlgoliaResults').html('');
  $('#state').val('');
  $('#city').val('');
  $('#postcode').val('');
});

// document.querySelector('#mybtn').addEventListener("click", function() {
//   console.dir(ltlgAR);
// });

//********************* SLIDER ***************************
var slider = $("#mySliderRadius");
// console.log(slider.val());

var output = $("#sliderValue");
output.append(slider.val()/1000);

slider.on('change', function() {
  output.html('');
  output.append(slider.val()/1000)

  if($('#address').val()){
    index.search('', {
      aroundLatLng: [ltlgAR[0], ltlgAR[1]],
      aroundRadius: slider.val(),
      hitsPerPage: 20
    }).then(({ hits }) => {
      $('#myAlgoliaResults').html('');

      for (var i = 0; i < hits.length; i++) {
        $('#myAlgoliaResults').append(
          '<li>'
          + hits[i]['city']
          + '</li>'
        );
      }
      // console.log(hits);
    });
  }

});

//********************* FINE AUTOCOMPLETE + SEARCH + SLIDER ***************************

//********************* PROVE CON AJAX ***************************


// $.ajax({
//   url: '/api/apartments/all',
//   method: 'GET',
//   success: function(apartments) {
//
//     // console.log(apartments);
//     var geolocs = [];
//     for (var i = 0; i < apartments.length; i++) {
//       var apart = apartments[i];
//       var geoloc = {
//         "id": apart['id'],
//         "city": apart['city'],
//         "_geoloc": {
//           "lat": parseFloat(apart['lat']),
//           "lng": parseFloat(apart['lng'])
//         }
//       }
//       geolocs.push(geoloc);
//     }
//     console.log(geolocs);
//     // var target = $('#posts');
//     // target.html('');
//     //
//     // for (var i = 0; i < posts.length; i++) {
//     //   var post = posts[i];
//     //   var html = '<li>' + post['title'] + ': '
//     //   + post['like'] + '</li>';
//     //   target.append(html);
//     // }
//
//   },
//   error: function(err) {
//     console.log('err', err);
//   }
// });

//*************************************************************************
//********************* FINE PROVE CON AJAX ***************************
