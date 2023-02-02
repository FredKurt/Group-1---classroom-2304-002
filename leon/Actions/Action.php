<?php
require_once __DIR__ . '/Interface.php';

class Action implements ActionInterface
{
    public function Create(): bool
    {
        $query = [];

        print_r($query);
        return true;
    }

    public function Update(): bool
    {
        $query = [];

        print_r($query);
        return true;
    }

    public function Delete(): bool
    {
        if (!empty($_POST["id"])) {
            print true;
            return true;
        } else {
            throw new Exception("no id");
            return false;
        }
    }

    public function Read(): array
    {
        $data = [];
        return $data;
    }
}
