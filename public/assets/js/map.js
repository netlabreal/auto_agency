var map;
DG.then(function () {
    map = DG.map('map', {
        center: [42.835746, 132.879839],
        zoom: 18
    });

    myDivIcon = DG.divIcon({
        iconSize: [65, 20],
        html: '<img src={{asset("assets/img/favicon.png")}}></img>'
    });

    myIcon = DG.icon({
        iconUrl: 'assets/img/favicon.png',
        //iconUrl: 'https://maps.api.2gis.ru/2.0/example_logo.png',
        iconSize: [24, 24]
    });
    //DG.marker([54.98, 82.89], {icon: myIcon}, {title:"Агенство недвижимости Собственник"}).addTo(map);
    DG.marker([42.835746, 132.879839], {icon: myIcon, title:'Автопрокат Бизнес-Партнер'}).addTo(map).bindPopup('Вы кликнули по мне!');
});
