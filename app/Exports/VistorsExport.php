<?php

namespace App\Exports;

use App\Models\Vistor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;

class VistorsExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return Vistor::select(["vistor_code", "vistor_phone", "vistor_balance", "vistor_count_slides", "vistor_count_activity", "notes"])->get();
    }
    public function headings(): array
    {
        return ["رقم التقرير", "رقم اليوزر", "رصيد اليوزر", "عدد الشرائح", "عدد التفعيلات", "ملاحظات"];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }
}
