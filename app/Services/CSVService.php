<?php

namespace App\Services;


class CSVService
{

    public static function createCsvFile(
        String $fileName,
        array $data,
        array $headers = []
    ) {
        $csvFile = fopen($fileName, 'w');

        if (!empty($headers)) {
            fputcsv($csvFile, $headers);
        }

        foreach ($data as $row) {
            fputcsv($csvFile, $row);
        }

        fclose($csvFile);
    }
}
