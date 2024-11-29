<?php

namespace App\Exports;

use App\Models\User;
use App\Models\TpScheme;
use Maatwebsite\Excel\Concerns\FromCollection;

class TpSchemeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()

    {

        return User::select("id", "name", "email")->get();

    }




    public function headings(): array

    {

        return ["ID", "Name", "Email"];

    }



}
