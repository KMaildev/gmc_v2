<?php

namespace App\Imports;

use App\Models\ShippingChassisManagement;
use Maatwebsite\Excel\Concerns\ToModel;

class ShippingChassisManagementImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ShippingChassisManagement([
            //
        ]);
    }
}
