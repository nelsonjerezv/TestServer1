<?php

namespace App\Exports;

use App\Models\EnsayoProbetasHormigon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class EnsayosHormigonExport implements FromView
{
    // use Exportable;

    // private $datos;
    // private $orden;

    // $this->$date = $date;
    public function __construct($datos, $orden)
    {
        $this->datos = $datos;
        $this->orden = $orden;
    }

    public function view(): View
    {
        // dd('aaasd', $this->datos, $this->orden);
        $orden = $this->orden;
        $datos = $this->datos;
        return view('informe_hormigon', compact('orden', 'datos') );
    }
}
