<?php
define(
    "SLOT_DB",
    __DIR__ . "/" . "slots_db.json"
);

function readFromSlotsJSON(): array
{
    $slots = [];
    if (file_exists(SLOT_DB)) {
        $json = file_get_contents(SLOT_DB);
        $slots = json_decode($json, true);
    }

    return $slots;
}

function addDataToSlotsJSON(string $id,  $date,  $time): void //change to right  type later
{

    if (is_writable(SLOT_DB)) {
        $slots = json_decode(file_get_contents(SLOT_DB), true);
        $slots[] = ["id" => $id, "date" => $date, "time" => $time];
        if (!file_put_contents(SLOT_DB, json_encode($slots))) {
            echo "Cannot write to the file!";
        }
    }
}

function clearAndWriteTheSlotsJSON(): void
{
    if (is_writable(SLOT_DB)) {
        if (!file_put_contents(SLOT_DB, json_encode([]))) {
            echo "Cannot write to the file!";
        }
    }
}

function updateSlotsJSON(array $slots): void
{
    if (is_writable(SLOT_DB)) {
        if (!file_put_contents(SLOT_DB, json_encode($slots))) {
            echo "Cannot write to the file!";
        }
    }
}
