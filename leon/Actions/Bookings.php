
<?php

require_once __DIR__ . '/Action.php';

class Bookings extends Action
{
    public function Create(): bool
    {
        $query = [
            "id" => uniqid(),
            "name" => $_POST["name"],
            "date" => $_POST["date"],
            "time" => $_POST["time"],
        ];

        print_r($query);
        return true;
    }

    public function Read(): array
    {
        $data = [
            [
                "id" => uniqid(),
                "name" => "user X",
                "date" => "01-06-2023",
                "time" => "morning"
            ],
            [
                "id" => uniqid(),
                "name" => "user Y",
                "date" => "10-06-2023",
                "time" => "evening"
            ]
        ];

        return $data;
    }
}


$Bookings = new Bookings();
