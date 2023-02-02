
<?php

require_once __DIR__ . "/Actions/Bookings.php";
require_once __DIR__ . "/Actions/Slots.php";

class Controller
{
    private Action $Bookings;
    private Action $Slots;

    public function __construct(Action $Bookings, Action $Slots)
    {
        $this->Bookings = $Bookings;
        $this->Slots = $Slots;
    }

    function handlePost()
    {
        if (!empty($_POST["type"])) {

            if ($_POST["type"] === "booking") {
                try {
                    match ($_POST['action']) {
                        "create" => $this->Bookings->Create(),
                        "update" => $this->Bookings->Update(),
                        "delete" => $this->Bookings->Delete(),
                    };
                } catch (Exception $e) {
                    echo 'Message: ' . $e->getMessage();
                }
            }

            if ($_POST["type"] === "slot") {
                try {
                    match ($_POST['action']) {
                        "create" => $this->Slots->Create(),
                        "update" => $this->Slots->Update(),
                        "delete" => $this->Slots->Delete(),
                    };
                } catch (Error $e) {
                    print_r($e);
                }
            }
        }
    }
    function Get(string $resource)
    {
        try {
            $result =  match ($resource) {
                "slots" => $this->Slots->Read(),
                "bookings" => $this->Bookings->Read(),
                default => throw new Exception("Invalid resource: $resource"),
            };
            return $result;
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}
// handle Form Data POST request

$controller = new Controller($Bookings, $Slots);
$controller->handlePost();
