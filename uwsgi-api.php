<?php
$conn = mysqli_connect("localhost", "ciel", "some_pass", "api");

$response = array();
if ($conn) {
    $sql = "select * from uwsgi where rss_usage like '%bytes%'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        $i=0;
        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i]['address_space_usage'] = $row ['address_space_usage'];
            $response[$i]['rss_usage'] = $row ['rss_usage'];
            $response[$i]['pid'] = $row ['pid'];
        $i++;
        }
        echo json_encode($response);
    }
}else{
    echo "database failed";
}
?>