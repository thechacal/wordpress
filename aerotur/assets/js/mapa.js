var map;
var idInfoBoxAberto;
var infoBox = [];
var markers = [];

function initialize() {
	var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);

    var options = {
        zoom: 1,
		center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false
    };

    map = new google.maps.Map(document.getElementById("maps"), options);
}

initialize();

function abrirInfoBox(id, marker) {
	if (typeof(idInfoBoxAberto) == 'number' && typeof(infoBox[idInfoBoxAberto]) == 'object') {
		infoBox[idInfoBoxAberto].close();
	}

	infoBox[id].open(map, marker);
	idInfoBoxAberto = id;
}

function carregarPontos() {

	var endereco = window.location.href;
	var fileuri = 'http://aeroturnovo.quadradigital.com.br/salinas/';
	if (endereco === 'http://aeroturnovo.quadradigital.com.br/salinas/') {
		fileuri = 'http://aeroturnovo.quadradigital.com.br/wp-content/themes/aerotur/salinas/assets/js/pontos.json';
	} else {
		fileuri = 'http://aeroturnovo.quadradigital.com.br/wp-content/themes/aerotur/salinas/assets/js/normal.json';
	}

	$.getJSON(fileuri, function(pontos) {

		var latlngbounds = new google.maps.LatLngBounds();

		$.each(pontos, function(index, ponto) {

			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(ponto.Latitude, ponto.Longitude),
				title: "",
				icon: 'http://aeroturnovo.quadradigital.com.br/wp-content/themes/aerotur/assets/img/marker.png'
			});

			var myOptions = {
				content: "<p>" + ponto.Descricao + "</p>",
				pixelOffset: new google.maps.Size(-150, 0)
        	};

			infoBox[ponto.Id] = new InfoBox(myOptions);
			infoBox[ponto.Id].marker = marker;

			infoBox[ponto.Id].listener = google.maps.event.addListener(marker, 'click', function (e) {
				abrirInfoBox(ponto.Id, marker);
			});
			infoBox[ponto.Id].open(map,marker);
			map.setZoom(18);

			markers.push(marker);

			latlngbounds.extend(marker.position);

		});

		var markerCluster = new MarkerClusterer(map, markers);

		map.fitBounds(latlngbounds);
		map.setZoom(18);

	});

}

carregarPontos();
