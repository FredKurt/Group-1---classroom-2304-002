
<?php

require_once __DIR__ . '/Action.php';

class Slots extends Action
{
    public function Create(): bool
    {
        $query = [
            "id" => uniqid(),
            "date" => $_POST["date"],
            "time" => $_POST["time"],
        ];
        print_r($query);
        return true;
    }

    public function Read(): array
    {
        $slots = [
            "morning",
            "afternoon",
            "evening"
        ];

        return $slots;
    }
}


$Slots = new Slots();
