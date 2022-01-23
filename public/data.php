<?php
include_once 'header.php';
include_once '../src/model/Affordable_houses.php';
include_once '../src/model/DataContext.php';

if (!isset($db)) {
    $db = new DataContext();
}

$coords = [];
?>
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
          integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
          crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
            integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
            crossorigin=""></script>
</head>
<style>
    .box {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .text {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .text p {
        text-align: center;
        width: 75%;
    }
    .text a {
        background-color: grey;
        color: white;
    }
    .text a:hover {
        color: black;
    }
</style>
<body>

<div class="box container-fluid col-md-12">
    <div class="text">
        <h1>Affordable Housing Built Data</h1>
        <p>This data is displayed from the csv data set provided from the Plymouth OpenData repository found <a href="https://plymouth.thedata.place/dataset/affordable-houses-built">here.</a> It shows number of affordable houses built between 2002 and 2015.</p>
    </div>

    <div class="container-fluid col-12">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <table class="table table-striped table-bordered border-dark">
                    <thead class="bg-dark text-white">
                    <tr>
                        <th>Date of start and finish</th>
                        <th>Number of houses</th>

                    </tr>
                    </thead>
                    <tbody class="border-dark">

                    <?php
                        $HTML = "";
                        $houses = $db->Affordable_Houses();
                        if($houses){
                            foreach ($houses as $house) {
                                $HTML .= "<tr>";
                                $HTML .= "<td>".$house->yearOfStartAndCompletion()."</td>";
                                $HTML .= "<td>".$house->numberOfHouses()."</td>";
                                $HTML .= "</tr>";
                            }
                        }
                        echo $HTML;
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<?php include_once 'footer.php'; ?>