
<?php

require_once __DIR__ . '/Action.php';
require_once __DIR__ . '/../Database/Slots.php';
class Slots extends Action
{
    public function create(): bool
    {

        try {
            addDataToSlotsJSON(
                uniqid(),
                $_POST["date"],
                $_POST["time"]
            );
            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    public function read(): array
    {
        $data =  readFromSlotsJSON();
        return $data;
    }
}


$Slots = new Slots();
