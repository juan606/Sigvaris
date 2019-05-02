<?php

namespace App\Http\Controllers;

use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\Printer;

class ReceiptController extends Controller
{
  

  public function printReceipt () {
  	$printerIp = 'localhost';
  $printerPort = 'COM1';
    $connector = new NetworkPrintConnector($printerIp, $printerPort);
    $printer = new Printer($connector);
    try {
      $printer->text("$receipt->title\n");
      $printer->text("-----------------------\n");
      $printer->text("$receipt->body\n");
      $printer->cut();
    } finally {
      $printer -> close();
    }
  }
}