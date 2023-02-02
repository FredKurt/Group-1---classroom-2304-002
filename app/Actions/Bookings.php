
<?php

require_once __DIR__ . '/Action.php';
require_once __DIR__ . '/../Database/Bookings.php';

class Bookings extends Action
{
    public function create(): bool
    {
        try {
            addDataToBookingsJSON(
                uniqid(),
                $_POST["name"],
                $_POST["date"],
                $_POST["time"]
            );
            //header("location: /");  doesnt work fix later
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update(): bool
    {
        $data = $this->read();
        updateBookingsJSON($data);
        return true;
    }
    public function read(): array
    {
        $data = readFromBookingsJSON();
        return $data;
    }

    public function delete(): bool
    {
        clearAndWriteBookingsJSON();
        return true;
    }
}


$Bookings = new Bookings();
