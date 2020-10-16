ymaps.ready(init);
var myMap, myPlacemark;

function init(){
	myMap = new ymaps.Map("map", {
		center: [55.73, 37.53],
		zoom: 7
	});

	myPlacemark = new ymaps.Placemark(
		[55.73240865658475, 37.53301854948041], {
			hintContent: 'Московское отделение',
			balloonContent: '3-й Сетуньский проезд, д.16'
		}
	);

	myMap.geoObjects.add(myPlacemark);

	myPlacemark = new ymaps.Placemark(
		[47.228153377860856, 39.701742981641196], {
			hintContent: 'Ростовское отделение',
			balloonContent: 'ул. Лермонтовская, д. 38'
		}
	);

	myMap.geoObjects.add(myPlacemark);

	myPlacemark = new ymaps.Placemark(
		[48.51359760527282, 44.52650980503093], {
			hintContent: 'Волгоградское отделение',
			balloonContent: 'ул. Доценко, д. 43'
		}
	);

	myMap.geoObjects.add(myPlacemark);
}