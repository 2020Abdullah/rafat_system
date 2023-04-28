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
   
    public function collection()
    {
        return Vistor::join('agents', 'vistors.Agent_id', '=', 'agents.id')->join('managers', 'vistors.manager_id', '=', 'managers.id')->select("vistor_code", "vistor_phone", "vistor_balance", "vistor_count_slides", "vistor_count_activity", "agents.name as agent", "managers.name as manager", "lat", "long", "notes")->get();
    }
    public function headings(): array
    {
<<<<<<< HEAD
        return ["كود اليوزر", "رقم الجوال", "رصيد اليوزر", "عدد الشرائح", "عدد التفعيلات", "اسم المطور" , "اسم المشرف" , "خطوط الطول", "خطوط العرض", "ملاحظات"];
=======
        return ["اسم المطور", "اسم المشرف" , "كود اليوزر", "رقم جوال اليوزر", "رصيد اليوزر", "عدد الشرائح", "عدد التفعيلات", "ملاحظات", "خطوط الطول", "خطوط العرض"];
>>>>>>> d4552b6f52e6256bf7f09afb11b0cc3168494e2a
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
