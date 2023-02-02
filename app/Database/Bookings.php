<?php

define(
    "BOOKINGS_DB",
    __DIR__ . "/" . "bookings_db.json"
);

function readFromBookingsJSON(): array
{
    $bookings = [];
    if (file_exists(BOOKINGS_DB)) {
        $json = file_get_contents(BOOKINGS_DB);
        $bookings = json_decode($json, true);
    }

    return $bookings;
}

function addDataToBookingsJSON(string $id, string $name,  $date,  $time): void //change to right  type later
{
    $bookings = json_decode(file_get_contents(BOOKINGS_DB), true);
    $bookings[] = ["id" => $id, "name" => $name, "date" => $date, "time" => $time];
    if (!file_put_contents(BOOKINGS_DB, json_encode($bookings))) {
        echo "Cannot write to the file!";
    }
}

function clearAndWriteBookingsJSON(): void
{
    if (is_writable(BOOKINGS_DB)) {
        if (!file_put_contents(BOOKINGS_DB, json_encode([]))) {
            echo "Cannot write to the file!";
        }
    }
}

function updateBookingsJSON(array $bookings): void
{
    if (is_writable(BOOKINGS_DB)) {
        if (!file_put_contents(BOOKINGS_DB, json_encode($bookings))) {
            echo "Cannot write to the file!";
        }
    }
}
