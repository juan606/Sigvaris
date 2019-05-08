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
                //   !!!IMPORTANTE!!!  son 47 caracteres por linea.

                // $connector = new WindowsPrintConnector("Epson TM-T20II");
                $connector = new WindowsPrintConnector("ImpresoraTermica");
                //$connector = new WindowsPrintConnector("epson");
                //dd($connector);
                $printer = new Printer($connector);
                // Vamos a alinear al centro lo próximo que imprimamos
                $printer->setJustification(Printer::JUSTIFY_CENTER);
                /*  Imprimimos un mensaje. Podemos usar
                    el salto de línea o llamar muchas
                    veces a $printer->text()
                */
                $printer->text("Sigvaris 2019" . "\n");
                $printer->text("Otra linea" . "\n");
                $printer->text(date("Y-m-d H:i:s") . "\n");
                //$printer->text("Paciente: Miguel Contreras Nuñez\n");
                //$printer->text("1234567890-1234567890-234567890-1234567890-1234567890-1234567890\n");
                //$printer->text("SKU    Producto    PrecioU   Cantidad   Precio\n");
                # Para mostrar el total
                $total = 0;
                /*foreach ($productos as $producto) {
                    $total += $producto->cantidad * $producto->precio;
                 
                    //Alinear a la izquierda para la cantidad y el nombre
                    $printer->setJustification(Printer::JUSTIFY_LEFT);
                    $printer->text($producto->cantidad . "x" . $producto->nombre . "\n");
                 
                    //Y a la derecha para el importe
                    $printer->setJustification(Printer::JUSTIFY_RIGHT);
                    $printer->text(' $' . $producto->precio . "\n");
                }*/
                $printer->setJustification(Printer::JUSTIFY_RIGHT);
                $printer->text("--------\n");
                $printer->text("TOTAL: $2360.56" ."\n");
                $printer->text("Muchas gracias por su compra");
                 
                /*
                    Hacemos que el papel salga. Es como 
                    dejar muchos saltos de línea sin escribir nada
                */
                $printer->feed(3);
                 
                /*
                    Cortamos el papel. Si nuestra impresora
                    no tiene soporte para ello, no generará
                    ningún error
                */
                $printer->cut();
                 
                /*
                    Por medio de la impresora mandamos un pulso.
                    Esto es útil cuando la tenemos conectada
                    por ejemplo a un cajón
                */
                $printer->pulse();
                 
                /*
                    Para imprimir realmente, tenemos que "cerrar"
                    la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
                */
                $printer->close();
            } catch(Exception $e) {
                return "Couldn't print to this printer: " . $e -> getMessage() . "\n";
            }
            //dd($markup);
        }
    }