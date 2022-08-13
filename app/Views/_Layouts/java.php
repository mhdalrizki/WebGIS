<script>
var map = new L.Map('map', {zoom: 18, center: new L.latLng(-7.747790,110.527470)});
// var map = L.map('map').setView([-7.747790,110.527470], 16);
map.addLayer(new L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 50,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11'}));

var markersLayer = new L.LayerGroup();
map.addLayer(markersLayer);
var controlSearch = new L.Control.Search({
		position:'topright',		
		layer: markersLayer,
		initial: false,
		zoom: 20,
		marker: false
	});
	map.addControl(controlSearch);
    

   <?php foreach ($getData as $key => $value) { ?>
        L.marker([<?= $value->latitude; ?>, <?= $value->longitude; ?> ]).addTo(map)
.bindPopup("<b><?= $value->kepala_keluarga;?></b></br> <?= $value->alamat;?></b></br> <?= $value->jumlah_anggota;?></b></br> <?= $value->keterangan_bantuan;?></b></br><?= $value->catatan;?></b></br><?= $value->foto;?></b>")
    <?php  }?>                                                                                                                                                                                                       

    var data = [  
    <?php foreach ($getData as $key => $value) : ?>
        {
            'lokasi' : [    <?= $value->latitude; ?>, <?= $value->longitude; ?> ],
            'nama' : "<?= $value->kepala_keluarga;?>",
            'alamat' : "<?= $value->alamat;?>",
            'jumlah' : "<?= $value->jumlah_anggota;?>",
            'keterangan' : "<?= $value->keterangan_bantuan;?>",
            'catatan' : "<?= $value->catatan;?>",
            'foto' : "<?= $value->foto;?>"
           
        },
    <?php endforeach;?>
    ];
    

    for (i in data) {

        var lokasi = data[i].lokasi; 
        var nama = data[i].nama;
        var alamat = data[i].alamat;
        var jumlah = data[i].jumlah;
        var keterangan = data[i].keterangan;  
        var catatan = data[i].catatan; 
        var foto = data[i].foto;        
        var marker = new L.Marker(new L.latLng(lokasi), {title: nama});
        marker.bindPopup('Nama Kepala :'+nama+  '<br>Alamat :'+alamat+ '<br>Jumlah Anggota KK:'+jumlah+ '<br>Keterangan Bantuan:'+keterangan+ '<br>Catatan Khusus:'+catatan+ '<br>Foto Rumah<br><img src="uploads/penduduk/'+foto+'" width="140" height="100">');        
        markersLayer.addLayer(marker);
    }

    
        
</script>



