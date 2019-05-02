<?php

    namespace App\Http\Controllers;

    use App\Pembayaran;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;
    use Mike42\Escpos\Printer; 
    use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
    use Mike42\Escpos\PrintConnectors\FilePrintConnector;
    use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
    use Mike42\Escpos;

    class PembayaranController extends Controller
    {
        public function print(Request $request)
        {
            try {
                // $connector = new WindowsPrintConnector("Epson TM-T20II");
                $connector = new WindowsPrintConnector("epson");
                //dd($connector);
                $printer = new Printer($connector);
                //dd($printer -> text("Hello World!\n"));
                $printer -> cut();
                $printer -> close();
            } catch(Exception $e) {
                return "Couldn't print to this printer: " . $e -> getMessage() . "\n";
            }
            //dd($markup);
        }
    }