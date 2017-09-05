<?php

use App\Data;
use Illuminate\Database\Seeder;

class DataTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_type')->delete();

        $data1 = new Data();
        $data1->quantity = "1gb";
        $data1->price = 600;
        $data1->network = "MTN";
        $data1->save();

        $data2 = new Data();
        $data2->quantity = "2gb";
        $data2->price = 1200;
        $data2->network = "MTN";
        $data2->save();

        $data3 = new Data();
        $data3->quantity = "3gb";
        $data3->price = 1700;
        $data3->network = "MTN";
		$data3->save();

		$data4 = new Data();
        $data4->quantity = "4gb";
        $data4->price = 2200;
        $data4->network = "MTN";
        $data4->save();

        $data5 = new Data();
        $data5->quantity = "5gb";
        $data5->price = 2700;
        $data5->network = "MTN";
        $data5->save();


        $data6 = new Data();
        $data6->quantity = "3.2gb";
        $data6->price = 900;
        $data6->network = "GLO";
        $data6->save();

        $data7 = new Data();
        $data7->quantity = "7.5gb";
        $data7->price = 1800;
        $data7->network = "GLO";
        $data7->save();

        $data8 = new Data();
        $data8->quantity = "10gb";
        $data8->price = 2300;
        $data8->network = "GLO";
        $data8->save();

        $data9 = new Data();
        $data9->quantity = "18gb";
        $data9->price = 3700;
        $data9->network = "GLO";
        $data9->save();

        $data10 = new Data();
        $data10->quantity = "24gb";
        $data10->price = 4600;
        $data10->network = "GLO";
        $data10->save();

        $data11 = new Data();
        $data11->quantity = "48gb";
        $data11->price = 7200;
        $data11->network = "GLO";
        $data11->save();

        $data12 = new Data();
        $data12->quantity = "500mb";
        $data12->price = 450;
        $data12->network = "ETISALAT";
        $data12->save();

        $data13 = new Data();
        $data13->quantity = "1gb";
        $data13->price = 700;
        $data13->network = "ETISALAT";
        $data13->save();

        $data14 = new Data();
        $data14->quantity = "2gb";
        $data14->price = 1400;
        $data14->network = "ETISALAT";
        $data14->save();

        $data15 = new Data();
        $data15->quantity = "3gb";
        $data15->price = 2000;
        $data15->network = "ETISALAT";
        $data15->save();

        $data16 = new Data();
        $data16->quantity = "4gb";
        $data16->price = 2600;
        $data16->network = "ETISALAT";
        $data16->save();

        $data17 = new Data();
        $data17->quantity = "5gb";
        $data17->price = 3200;
        $data17->network = "ETISALAT";
        $data17->save();

        $data18 = new Data();
        $data18->quantity = "1.5gb";
        $data18->price = 900;
        $data18->network = "AIRTEL";
        $data18->save();

        $data19 = new Data();
        $data19->quantity = "3.5gb";
        $data19->price = 1800;
        $data19->network = "AIRTEL";
        $data19->save();

        $data20 = new Data();
        $data20->quantity = "5gb";
        $data20->price = 2400;
        $data20->network = "AIRTEL";
        $data20->save();

        $data21 = new Data();
        $data21->quantity = "7gb";
        $data21->price = 3400;
        $data21->network = "AIRTEL";
        $data21->save();
    }
}
