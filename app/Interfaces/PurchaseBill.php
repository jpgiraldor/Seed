<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface PurchaseBill {

public function generate();
public function download();
}