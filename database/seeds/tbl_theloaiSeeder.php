<?php

use Illuminate\Database\Seeder;

class tbl_theloaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_theloai')->insert(
	     	[
	     		[
			        'ten' => 'Máy tính/Laptop',
			        'slug' => 'may-tinh-laptop',
			        'parent_id' => '0',
			    ],
			    [
			        'ten' => 'Di Động',
			        'slug' => 'di-dong',
			        'parent_id' => '0',
			    ],
			    [
			        'ten' => 'Đồ chơi số',
			        'slug' => 'do-choi',
			        'parent_id' => '0',
			    ],
			    [
			        'ten' => 'App/Game',
			        'slug' => 'app-game',
			        'parent_id' => '0',
			    ],
			    [
			        'ten' => 'Thủ Thuật',
			        'slug' => 'thu-thuat',
			        'parent_id' => '0',
			    ],
			    [
			        'ten' => 'Điện thoại',
			        'slug' => 'dien-thoai',
			        'parent_id' => '2',
			    ],
			    [
			        'ten' => 'Máy tính bảng',
			        'slug' => 'may-tinh-bang',
			        'parent_id' => '2',
			    ],
			    [
			        'ten' => 'Máy ảnh',
			        'slug' => 'may-anh',
			        'parent_id' => '3',
			    ],
			    [
			        'ten' => 'Phụ kiện',
			        'slug' => 'phu-kien',
			        'parent_id' => '3',
			    ]
	     	]  
	    );
    }
}
