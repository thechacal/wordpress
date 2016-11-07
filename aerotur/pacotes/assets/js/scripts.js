jQuery(document).ready(function(){
  jQuery('#slippry-demo').slippry({
  	controls: false
  	//pager: false // remove o pager do slider
  })
});

jQuery(document).ready(function(){
  jQuery('#slider-topo').slippry({
  	controls: false,
  	pager: false,
  	controls: true
  	//pager: false // remove o pager do slider
  })
});



var elem = document.querySelector('.grid');
  var iso = new Isotope( elem, {
    // options
    itemSelector: '.grid-item',
    layoutMode: 'fitRows'
  });

  // element argument can be a selector string
  //   for an individual element
  var iso = new Isotope( '.grid', {
    // options
  });
