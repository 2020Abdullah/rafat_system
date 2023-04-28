<?php

namespace App\Exports;

use App\Models\Vistor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;

class vistorsManagerExport implements FromCollection, WithHeadings, WithEvents
{
    public $user;
    
    public function __construct($user_id)
    {
        $this->user = $user_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vistor::where('vistors.manager_id', $this->user)->join('agents', 'vistors.Agent_id', '=', 'agents.id')->select("vistor_code", "vistor_phone", "vistor_balance", "vistor_count_slides", "vistor_count_activity", "name" , "lat", "long" , "notes")->get();
    }

    public function headings(): array
    {
        return  ["كود اليوزر", "رقم الجوال", "رصيد اليوزر", "عدد الشرائح", "عدد التفعيلات", "اسم المطور", "خطوط الطول", "خطوط العرض", "ملاحظات"];
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
