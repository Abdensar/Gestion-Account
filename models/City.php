<?php
class City {
    public static function selectAllCities($conn) {
        $sql = "SELECT id, cityName FROM Cities";
        $result = mysqli_query($conn, $sql);
        $cities = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $cities[] = $row;
        }
        return $cities;
    }
}
?>
