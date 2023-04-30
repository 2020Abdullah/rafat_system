<?php

namespace App\Exports;

use App\Models\Vistor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;

class VistorsExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return Vistor::join('agents', 'vistors.Agent_id', '=', 'agents.id')->join('managers', 'vistors.manager_id', '=', 'managers.id')->select("vistor_code", "vistor_phone", "vistor_balance", "vistor_count_slides", "vistor_count_activity", "agents.name as agent", "managers.name as manager", "lat", "long", "date", "time", "notes")->get();
    }

    public function headings(): array
    {
        return ["كود اليوزر", "رقم الجوال", "رصيد اليوزر", "عدد الشرائح", "عدد التفعيلات", "اسم المطور", "اسم المشرف", "خطوط الطول", "خطوط العرض", "تاريخ الزيارة", "وقت الزيارة", "ملاحظات"];
    }
}
