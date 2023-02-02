<?php

function readFromBookingsJSON(string $fileName): array
{
    $bookings = [];
    if (file_exists($fileName)) {
        $json = file_get_contents($fileName);
        $bookings = json_decode($json, true);
    }

    return $bookings;
}

function addDataToBookingsJSON(string $fileName, string $id, string $name, datetime $date, datetime $time): void
{
    if (is_writable($fileName)) {
        $bookings = json_decode(file_get_contents($fileName), true);
        $bookings[] = ["id" => $id, "name" => $name, "date" => $date, "time" => $time];
        if (!file_put_contents($fileName, json_encode($bookings))) {
            echo "Cannot write to the file!";
        }
    }
}

function clearAndWriteBookingsJSON(string $fileName): void
{
    if (is_writable($fileName)) {
        if (!file_put_contents($fileName, json_encode([]))) {
            echo "Cannot write to the file!";
        }
    }
}

function updateBookingsJSON(string $fileName, array $bookings): void
{
    if (is_writable($fileName)) {
        if (!file_put_contents($fileName, json_encode($bookings))) {
            echo "Cannot write to the file!";
        }
    }
}