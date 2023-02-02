<?php


interface ActionInterface
{
    public function Create(): bool;
    public function Read(): array;
    public function Update(): bool;
    public function Delete(): bool;
}
