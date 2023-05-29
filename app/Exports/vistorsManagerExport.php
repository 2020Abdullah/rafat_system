<?php

namespace App\Exports;

use App\Models\Vistor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;

class vistorsManagerExport implements FromCollection, WithHeadings
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
        return Vistor::where('vistors.manager_id', $this->user)->join('agents', 'vistors.Agent_id', '=', 'agents.id')->select("vistor_code", "vistor_phone", "vistor_balance", "vistor_count_slides", "vistor_count_activity", "agents.name as agent", "Owner_identify_number", "Owner_ID_expiry_date", "place_code", "place_trade_number", "place_expire_date", "seller_identify_number", "seller_ID_expiry_date", "lat", "long", "date", "time", "notes")->get();
    }

    public function headings(): array
    {
        return ["كود اليوزر", "رقم الجوال", "رصيد اليوزر", "عدد الشرائح", "عدد التفعيلات", "اسم المطور", "رقم هوية المالك", "تاريخ انتهاء الهوية", "رقم المنشأة", "رقم السجل التجارى", "تاريخ انتهاء السجل", "رقم هوية الموظف / البائع", "تاريخ انتهاء هوية الموظف  / البائع", "خطوط الطول", "خطوط العرض", "تاريخ الزيارة", "وقت الزيارة", "ملاحظات"];
    }
}
