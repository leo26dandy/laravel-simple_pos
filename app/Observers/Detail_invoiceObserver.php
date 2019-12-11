<?php

namespace App\Observers;

use App\Detail_invoice;

class Detail_invoiceObserver
{

    private function generateTotal($detailInvoice)
    {
        $invoice_id = $detailInvoice->invoice_id;
        $detailInvoice = Detail_invoice::where('invoice_id', $invoice_id)->get();
        $total = $detailInvoice->sum(function ($i) {
            return $i->harga * $i->banyak_brg;
        });
        $detailInvoice->invoice()->update([
            'total' => $total
        ]);
    }


    /**
     * Handle the detail_invoice "created" event.
     *
     * @param  \App\Detail_invoice  $detailInvoice
     * @return void
     */
    public function created(Detail_invoice $detailInvoice)
    {
        //
        $this->generateTotal($detailInvoice);
    }

    /**
     * Handle the detail_invoice "updated" event.
     *
     * @param  \App\Detail_invoice  $detailInvoice
     * @return void
     */
    public function updated(Detail_invoice $detailInvoice)
    {
        //
        $this->generateTotal($detailInvoice);
    }

    /**
     * Handle the detail_invoice "deleted" event.
     *
     * @param  \App\Detail_invoice  $detailInvoice
     * @return void
     */
    public function deleted(Detail_invoice $detailInvoice)
    {
        //
        $this->generateTotal($detailInvoice);
    }

    /**
     * Handle the detail_invoice "restored" event.
     *
     * @param  \App\Detail_invoice  $detailInvoice
     * @return void
     */
    public function restored(Detail_invoice $detailInvoice)
    {
        //
    }

    /**
     * Handle the detail_invoice "force deleted" event.
     *
     * @param  \App\Detail_invoice  $detailInvoice
     * @return void
     */
    public function forceDeleted(Detail_invoice $detailInvoice)
    {
        //
    }
}
