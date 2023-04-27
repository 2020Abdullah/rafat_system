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
        return Vistor::join('agents', 'vistors.Agent_id', '=', 'agents.id')->join('managers', 'vistors.manager_id', '=', 'managers.id')->select('agents.name as agent', 'managers.name as manager', "vistor_code", "vistor_phone", "vistor_balance", "vistor_count_slides", "vistor_count_activity", "notes", "lat", "long")->get();
    }
    public function headings(): array
    {
        return ["اسم المطور", "اسم المشرف" , "رقم التقرير", "رقم اليوزر", "رصيد اليوزر", "عدد الشرائح", "عدد التفعيلات", "ملاحظات", "خطوط الطول", "خطوط العرض"];
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
