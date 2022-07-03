<script src="/mazer/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/mazer/dist/assets/js/bootstrap.bundle.min.js"></script>
<script src="/mazer/dist/assets/js/mazer.js"></script>
<script src="/mazer/dist/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script src="https://combinatronics.com/Sha256/Pristine/master/dist/pristine.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    <?php
    if (session()->getFlashdata('info')) {
    ?>
        Swal.fire({
            icon: '<?= session()->getFlashdata('info') ?>',
            title: '<?= session()->getFlashdata('message') ?>',
        })
    <?php
    }
    ?>

    


    let deleteData = (thisValue) => {
        Swal.fire({
            title: 'Yakin hapus data?',
            icon: 'warning',
            html: 'Data akan dihapus permanent',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: true,
            confirmButtonText: '<i class="bi bi-check"></i> Lanjutkan',
            confirmButtonAriaLabel: 'Lanjutkan dihapus',
            cancelButtonText: '<i class="bi bi-x"></i> Batal',
            cancelButtonAriaLabel: 'Batalkan'
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location = thisValue.getAttribute('data-href');
            }
        })
    }
    var curLocation=[0,0];
    if(curLocation[0]==0 && curLocation[1]==0){
        curLocation=[-7.747790,110.527470];
    }
    var map = L.map('map').setView([-7.747790,110.527470], 13);

var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
}).addTo(map);

map.attributionControl.setPrefix(false);

var marker = new L.marker(curLocation, {
    draggable:'true'
}).addTo(map);

// marker.on('dragend', function(event){
//     var position = marker.getLatLng();
//     marker.setLatLng(position,{
//         draggable : 'true'
//     }).bindPopup(position).update();
//     $("#latitude").val(position.lat);
//     $("#longitude").val(position.lng).keyup();
// }).addTo(map);

// $("#latitude, #longitude").change(function() {
//     var position =[parseInt($("#latitude").val()), parseInt($("#longitude").val())];
//     marker.setLatLng(position, {
//         draggable : 'true'
//     }).bindPopup(position).update();
//     map.panTo(position);
// }).addTo(map);

function onMapClick(e) {
           var marker = L.marker(e.latlng, {
               draggable: true,
               riseOnHover: true
           }).addTo(map)
               .bindPopup(e.latlng.toString()).openPopup();
               
               document.getElementById("latitude").value = e.latlng.lat;
               document.getElementById("longitude").value = e.latlng.lng;
           
               marker.on("dragend", function (ev) {
               var chagedPos = ev.target.getLatLng();
               marker.setLatLng(chagedPos,{
        draggable : 'true'
     }).bindPopup(chagedPos).update();
               this.bindPopup(chagedPos.toString()).openPopup();
           });
       }
       map.on('click', onMapClick);

       $("#latitude, #longitude").change(function() {
    var position =[parseInt($("#latitude").val()), parseInt($("#longitude").val())];
    marker.setLatLng(chagedPos, {
        draggable : 'true'
    }).bindPopup(chagedPos).update();
    map.panTo(position);
}).addTo(map);
    




</script>