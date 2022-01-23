<?php

include_once  'Affordable_houses.php';

class DataContext
{
    public function Affordable_Houses()
    {
        $houses = [];
        $headers = [];

        $file =fopen('../assets/data/houses.csv', 'r');
        if ($file) {
            $lineCount = 0;

            while($data = fgetcsv($file, 1000, ",")) {
                if ($lineCount > 0) {
                    $ah = new Affordable_houses($data[0], $data[1]);
                    $houses[] = $ah;
                    $lineCount++;
                } else {
                    $headers = $data;
                    $lineCount++;
                }
            }
        }

        return $houses;
    }
}