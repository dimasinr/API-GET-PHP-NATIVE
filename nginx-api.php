<?php
$conn = mysqli_connect("localhost", "ciel", "some_pass", "api");

$response = array();
if ($conn) {
    $sql = "select * from nginx where ip_address like '%.%'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        $i=0;
        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i]['ip_address'] = $row ['ip_address'];
            $response[$i]['date'] = $row ['date'];
            $response[$i]['method'] = $row ['method'];
            $response[$i]['status_server'] = $row ['status_server'];
            $response[$i]['ping_ms'] = $row ['ping_ms'];
            $response[$i]['site_request'] = $row ['site_request'];
            $response[$i]['rt'] = $row ['rt'];
            $response[$i]['uct'] = $row ['uct'];
            $response[$i]['uht'] = $row ['uht'];
            $response[$i]['urt'] = $row ['urt'];
            $response[$i]['gz'] = $row ['gz'];
        $i++;
        }
        echo json_encode($response);
    }
}else{
    echo "database failed";
}
?>