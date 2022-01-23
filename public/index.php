<?php
    include_once 'header.php'
?>

<body>
<style>
    .container {
        display: flex;

    }
    img {
        width: 70%;
    }
    .text {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .text a {
        background-color: grey;
        color: white;
    }
    .text a:hover {
        color: black;
    }
</style>
<!-- Banner Image -->
<div class="container">
    <img src="../assets/img/preview.jpg">
    <div class="text">
        <h1>Affordable Housing</h1>
        <p>This is for those who are interested in number of affordable houses build in Plymouth between 2002 and 2015. Data is presented in both Human-Readable and Machine Readable. The URL for this dataset is <a href="https://plymouth.thedata.place/dataset/affordable-houses-built">Affordable Houses built</a>. </p>
    </div>
</div>

</body>

<?php include_once 'footer.php'; ?>

