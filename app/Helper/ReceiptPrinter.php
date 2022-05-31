<?php

namespace App\Helper;

use charlieuki\ReceiptPrinter\Item as Item;
use charlieuki\ReceiptPrinter\Store as Store;
use Mike42\Escpos\Printer;
use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\CupsPrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

class ReceiptPrinter
{
    private $printer;
    private $logo;
    private $store;
    private $items;
    private $currency = 'Rp';
    private $subtotal = 0;
    private $tax_percentage = 10;
    private $tax = 0;
    private $grandtotal = 0;
    private $request_amount = 0;
    private $qr_code = [];
    private $transaction_id = '';
    function __construct()
    {
        $this->printer = null;
        $this->items = [];
    }
    public function init($connector_type, $connector_descriptor, $connector_port = 9100)
    {
        switch (strtolower($connector_type)) {
            case 'cups':
                $connector = new CupsPrintConnector($connector_descriptor);
                break;
            case 'windows':
                $connector = new WindowsPrintConnector($connector_descriptor);
                break;
            case 'network':
                $connector = new NetworkPrintConnector($connector_descriptor);
                break;
            default:
                $connector = new FilePrintConnector("php://stdout");
                break;
        }
        if ($connector) {
            // Load simple printer profile
            $profile = CapabilityProfile::load("default");
            // Connect to printer
            $this->printer = new Printer($connector, $profile);
        } else {
            throw new Exception('Invalid printer connector type. Accepted values are: cups');
        }
    }
    public function close()
    {
        if ($this->printer) {
            $this->printer->close();
        }
    }
    public function setStore($mid, $name, $address, $phone, $email, $website)
    {
        $this->store = new Store($mid, $name, $address, $phone, $email, $website);
    }
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
    public function addItem($name, $qty, $price)
    {
        $item = new Item($name, $qty, $price);
        $item->setCurrency($this->currency);
        $this->items[] = $item;
    }
    public function setRequestAmount($amount)
    {
        $this->request_amount = $amount;
    }
    public function setTax($tax)
    {
        $this->tax_percentage = $tax;
        if ($this->subtotal == 0) {
            $this->calculateSubtotal();
        }
        $this->tax = (int) $this->tax_percentage / 100 * (int) $this->subtotal;
    }
    public function calculateSubtotal()
    {
        $this->subtotal = 0;
        foreach ($this->items as $item) {
            $this->subtotal += (int) $item->getQty() * (int) $item->getPrice();
        }
    }
    public function calculateGrandTotal()
    {
        if ($this->subtotal == 0) {
            $this->calculateSubtotal();
        }
        $this->grandtotal = (int) $this->subtotal + (int) $this->tax;
    }
    public function setTransactionID($transaction_id)
    {
        $this->transaction_id = $transaction_id;
    }
    public function setQRcode($content)
    {
        $this->qr_code = $content;
    }
    public function setTextSize($width = 1, $height = 1)
    {
        if ($this->printer) {
            $width = ($width >= 1 && $width <= 8) ? (int) $width : 1;
            $height = ($height >= 1 && $height <= 8) ? (int) $height : 1;
            $this->printer->setTextSize($width, $height);
        }
    }
    public function getPrintableQRcode()
    {
        return json_encode($this->qr_code);
    }
    public function getPrintableHeader($left_text, $right_text, $is_double_width = false)
    {
        $cols_width = $is_double_width ? 8 : 16;
        return str_pad($left_text, $cols_width) . str_pad($right_text, $cols_width, ' ', STR_PAD_LEFT);
    }
    public function getPrintableSummary($label, $value, $is_double_width = false)
    {
        $left_cols = $is_double_width ? 6 : 12;
        $right_cols = $is_double_width ? 10 : 20;
        $formatted_value = $this->currency . number_format($value, 0, ',', '.');
        return str_pad($label, $left_cols) . str_pad($formatted_value, $right_cols, ' ', STR_PAD_LEFT);
    }
    public function feed($feed = NULL)
    {
        $this->printer->feed($feed);
    }
    public function cut()
    {
        $this->printer->cut();
    }
    public function printDashedLine()
    {
        $line = '';
        for ($i = 0; $i < 32; $i++) {
            $line .= '-';
        }
        $this->printer->text($line);
    }
    public function printLogo()
    {
        if ($this->logo) {
            $image = EscposImage::load($this->logo, false);
            //$this->printer->feed();
            //$this->printer->bitImage($image);
            //$this->printer->feed();
        }
    }
    public function printQRcode()
    {
        if (!empty($this->qr_code)) {
            $this->printer->qrCode($this->getPrintableQRcode(), Printer::QR_ECLEVEL_L, 8);
        }
    }
    function appendWhiteSpaceBefore($text, $length)
    {
        $text_length = strlen($text);
        $rem_length = (int) $length - (int) $text_length;
        $white_spaces = str_repeat(" ", (int) $rem_length);
        return $final_text = $white_spaces . $text;
    }
    function appendWhiteSpaceAfter($text, $length)
    {
        $text_length = strlen($text);
        $rem_length = (int) $length - (int) $text_length;
        $white_spaces = str_repeat(" ", (int) $rem_length);
        return $text . $white_spaces;
    }
    public function printReceipt(...$cartTtem)
    {

        $products = $cartTtem[0][0];
        $total_amount = $cartTtem[0][1];
        $discount = $cartTtem[0][2];
        $totalPayable = $cartTtem[0][3];
        $amount_pay = $cartTtem[0][4];
        $change_return = $cartTtem[0][5];
        $customer_id = $cartTtem[0][6];
        $customer_name = $cartTtem[0][7];
        $invoice_no = $cartTtem[0][8];


        // $money= $cartTtem[0]["money"];
        if ($this->printer) {

            //--------Store Information------------
            $store_name = "Excel IT POS";
            $store_address = "17, Alhaz Samsuddin Mansion (9th Floor),\nMoghbazar, New Easkaton, Ramna, Dhaka-1217";
            $store_Phone = "+88 01611 815656";
            $store_bin = "00000000000-0000";
            //---------Invoice Information-----------
            $invoiceNo =  $invoice_no;
            $invoiceDate =  date("Y-m-d");;
            //---------Customer and Employee Information-----------
            $customerName =  $customer_name;
            $customerId = $customer_id;
            $cashier = 'Admin';
            // date_default_timezone_set("Asia/Dhaka");
            $printTime = date("Y-m-d h:i:s a");
            $paymentMethod = "Cash";

            // ---------Print Store Name-----------
            $this->printer->setJustification(Printer::JUSTIFY_CENTER);
            $this->printer->setTextSize(2, 2);
            $this->printer->text($store_name . "\n");
            // // ---------Print Store Details-----------
            $this->printer->setTextSize(1, 1);
            $this->printer->text($store_address . "\n");
            $this->printer->text($store_Phone . "\n");
            $this->printer->text("BIN: " . $store_bin . "\n");
            $this->printer->text("Mushak-6.3\n");
            $this->printer->textRaw(str_repeat(chr(196), 48) . PHP_EOL);
            $this->printer->setTextSize(1, 1);
            $this->printer->text("Excel IT POS Invoice\n");
            $this->printer->textRaw(str_repeat(chr(196), 48) . PHP_EOL);
            //     // ---------Invoice and customer -----------
            $this->printer->setJustification(Printer::JUSTIFY_LEFT);
            $this->printer->text("Invoice#: " . $invoiceNo . "\n");
            $this->printer->text("Bill Date: " . $invoiceDate . "\n\n");
            $this->printer->text("Cus. Id: " . $customerId . "\n");
            $this->printer->text("Cus. Name: " . $customerName . "\n");
            $this->printer->text("Cashier: " . $cashier . "\n");
            $this->printer->text("Print Time: " . $printTime . "\n");
            $this->printer->text("Payment Method: " . $paymentMethod . "\n");
            $this->printer->textRaw(str_repeat(chr(196), 48) . PHP_EOL);
            // $this->printer->text($this->appendWhiteSpaceAfter("Sl.", 5) . $this->appendWhiteSpaceAfter("Id.", 5) . $this->appendWhiteSpaceAfter("Product Name", 38));
            $this->printer->text($this->appendWhiteSpaceAfter("Sl.", 5) . $this->appendWhiteSpaceAfter("Product Name", 43));
            $this->printer->textRaw(str_repeat(chr(196), 45) . PHP_EOL);
            $this->printer->text("       " . $this->appendWhiteSpaceAfter("Qty.", 9) . $this->appendWhiteSpaceAfter('U Price', 9) . $this->appendWhiteSpaceAfter('Disc.', 9) . $this->appendWhiteSpaceAfter('VAT', 9) . $this->appendWhiteSpaceAfter('Total', 9) . "\n");
            $serial = 1;
            $this->printer->textRaw(str_repeat(chr(196), 45) . PHP_EOL);
            foreach ($products as $product) {
                $this->printer->text($this->appendWhiteSpaceAfter($serial++, 5)  . $this->appendWhiteSpaceAfter($product->pro_name, 43));
                $this->printer->text("       " . $this->appendWhiteSpaceAfter($product->pro_quantity, 9) . $this->appendWhiteSpaceAfter($product->product_price, 9) . $this->appendWhiteSpaceAfter(0, 9) . $this->appendWhiteSpaceAfter(0, 9) . $this->appendWhiteSpaceAfter($product->sub_total, 9) . "\n");
            }
            $this->printer->textRaw(str_repeat(chr(196), 48) . PHP_EOL);

            $this->printer->setJustification(Printer::JUSTIFY_RIGHT);
            $this->printer->text("Sub Total:" . $total_amount . " TK.\n");
            $this->printer->text("Discount:" . $discount . " %.\n");
            $this->printer->text("Total:" . $totalPayable . " TK.\n");
            $this->printer->textRaw(str_repeat(chr(196), 48) . PHP_EOL);
            $this->printer->text("Pay:" . $amount_pay . " TK.\n");
            $this->printer->text("Return Amount:" . $change_return . " TK.\n");
            // $this->printer->text("VAT:" . $vat . " TK.\n");
            $this->printer->setTextSize(2, 1);
            $this->printer->textRaw(str_repeat(chr(196), 48) . PHP_EOL);
            $this->printer->text("Grand Total: " . $totalPayable . " TK.\n\n\n");

            $this->printer->textRaw(str_repeat(chr(196), 48) . PHP_EOL);
            $this->printer->setJustification(Printer::JUSTIFY_RIGHT);
            $this->printer->setTextSize(1, 1);
            // $this->printer->text("Paid Amount:" . $paidAmount . " TK.\n");
            $this->printer->text("Return Amount:");
            $this->printer->setReverseColors(true);
            // $this->printer->text($returnAmount . " TK.\n");
            $this->printer->setReverseColors(false);
            //---------Return Policy -----------
            $this->printer->setJustification(Printer::JUSTIFY_LEFT);
            $this->printer->setTextSize(1, 1);
            $this->printer->text("Return Policy:\n");
            $this->printer->textRaw(str_repeat(chr(196), 14) . PHP_EOL);
            $this->printer->text("* Please bring your receipt as proof of purchase for return or exchange within 3 days\n");
            $this->printer->text("* Cash refund is discouraged\n\n\n");
            $this->printer->setJustification(Printer::JUSTIFY_CENTER);
            $this->printer->text("Thank you for Shopping with us\n\n\n");
            // $this->printer->feed(5);
            $this->printer->cut();
            $this->printer->close();
        } else {
            throw new Exception('Printer has not been initialized.');
        }
    }
    public function printRequest()
    {
        if ($this->printer) {
            // Get request amount
            $total = $this->getPrintableSummary('TOTAL', $tis->request_amount, true);
            $header = $this->getPrintableHeader(
                'TID: ' . $this->transaction_id,
                'MID: ' . $this->store->getMID()
            );
            $footer = "This is not a proof of payment.\n";
            // Init printer settings
            $this->printer->initialize();
            $this->printer->feed();
            $this->printer->setJustification(Printer::JUSTIFY_CENTER);
            // Print logo
            $this->printLogo();
            // Print receipt headers
            $this->printer->selectPrintMode();
            $this->printer->text("{$this->store->getName()}\n");
            $this->printer->text("{$this->store->getAddress()}\n");
            $this->printer->text($header . "\n");
            $this->printer->feed();
            // Print receipt title
            $this->printDashedLine();
            $this->printer->setEmphasis(true);
            $this->printer->text("PAYMENT REQUEST\n");
            $this->printer->setEmphasis(false);
            $this->printDashedLine();
            $this->printer->feed();
            // Print instruction
            $this->printer->text("Please scan the code below\nto make payment\n");
            $this->printer->feed();
            // Print qr code
            $this->printQRcode();
            $this->printer->feed();
            // Print grand total
            $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            $this->printer->text($total . "\n");
            $this->printer->feed();
            $this->printer->selectPrintMode();
            // Print receipt footer
            $this->printer->feed();
            $this->printer->setJustification(Printer::JUSTIFY_CENTER);
            $this->printer->text($footer);
            $this->printer->feed();
            // Print receipt date
            $this->printer->text(date('j F Y H:i:s'));
            $this->printer->feed(2);
            // Cut the receipt
            $this->printer->cut();
            $this->printer->close();
        } else {
            throw new Exception('Printer has not been initialized.');
        }
    }
}
