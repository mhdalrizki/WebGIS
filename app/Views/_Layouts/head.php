<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $titlle ?? 'Dashboard' ?></title>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/mazer/dist/assets/css/bootstrap.css">

<link rel="stylesheet" href="/mazer/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
<link rel="stylesheet" href="/mazer/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css">
<link rel="stylesheet" href="/mazer/dist/assets/css/app.css">
<link rel="shortcut icon" href="/mazer/dist/assets/images/favicon.svg" type="image/x-icon">
<link rel="stylesheet" href="/mazer/dist/assets/vendors/simple-datatables/style.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<script src="/leaflet-search/src/leaflet-search.js"></script>
<link rel="stylesheet" href="/leaflet-search/src/leaflet-search.css">


<style type="text/css">
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icon@1.8.1/font/bootstrap-icons.css");

    .datatable-container {
        min-height: 200px;
    }

    .pristine-error {
        color: #f30;
    }

    .has-danger .form-control {
        border-color: #f30;
    }
</style>