<?php

function readFromSlotsJSON(string $fileName): array
{
    $slots = [];
    if (file_exists($fileName)) {
        $json = file_get_contents($fileName);
        $slots = json_decode($json, true);
    }

    return $slots;
}

function addDataToSlotsJSON(string $fileName, string $id, datetime $date, datetime $time): void
{
    if (is_writable($fileName)) {
        $slots = json_decode(file_get_contents($fileName), true);
        $slots[] = ["id" => $id, "date" => $date, "time" => $time];
        if (!file_put_contents($fileName, json_encode($slots))) {
            echo "Cannot write to the file!";
        }
    }
}

function clearAndWriteTheSlotsJSON(string $fileName): void
{
    if (is_writable($fileName)) {
        if (!file_put_contents($fileName, json_encode([]))) {
            echo "Cannot write to the file!";
        }
    }
}

function updateSlotsJSON(string $fileName, array $slots): void
{
    if (is_writable($fileName)) {
        if (!file_put_contents($fileName, json_encode($slots))) {
            echo "Cannot write to the file!";
        }
    }
}