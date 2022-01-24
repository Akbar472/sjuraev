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
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        .chart {
            position: relative;
            width: 50vw;
            height: 50vh;
            margin-bottom: 4rem
        }
    </style>
</head>

<body>

<div class="box container-fluid col-md-12">
    <div class="text">
        <h1>Affordable Housing Built Data</h1>
        <p>This data is displayed from the csv data set provided from the Plymouth OpenData repository found <a href="https://plymouth.thedata.place/dataset/affordable-houses-built">here.</a> It shows number of affordable houses built between 2002 and 2015.</p>
    </div>

    <div class="chart">
        <canvas id="myChart"></canvas>
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


    <script>
        const ctx = document.getElementById('myChart').getContext('2d');

        let gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(0, 0, 0, 1)');
        gradient.addColorStop(1, 'rgba(255, 255, 255, 0.3)');

        const labels = [
            '2003',
            '2004',
            '2005',
            '2006',
            '2007',
            '2008',
            '2009',
            '2010',
            '2011',
            '2012',
            '2013',
            '2014',
            '2015'
        ];

        const data = {
            labels,
            datasets: [{
                data: [166, 67, 163, 154, 252, 216, 290, 335, 368, 276, 266, 183, 396],
                label: "Number of affordable houses built",
                fill: true,
                backgroundColor: gradient,
            },
            ],
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
            },
        };

        const myChart = new Chart(ctx, config);
    </script>
</body>
<?php include_once 'footer.php'; ?>