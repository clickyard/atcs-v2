<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$permissions = [
'عرض عميل',
'إضافة عميل',
'تعديل عميل',
'حذف عميل',
'تعديل سيارة',
'تعديل كفيل',
'تعديل دفتر افراج',

'الخطابات',
'إجراءات الافراج الموقت',
'إذن دخول',
'تخليص',
'تمديد',
'مغادرة',
'ترحيل',

'التقارير',
'المرفقات',


'الاعدادات',
'عرض الاعدادات',
'إضافة الاعدادات',
'تعديل الاعدادات',
'حذف الاعدادات',


'إصدار دفتر المرور',
' إضافة دفتر',
'تعديل دفتر',
'حذف دفتر',
'طلبات الدفتر',
'تقارير إصدار الدفتر',


'إصدار الرخصة',
'عرض الرخص',
'إضافة رخصة',
'تعديل رخصة',
'حذف رخصة',
'طلبات الرخصة',
'تقارير الرخص',


'عرض مستخدم',
'إضافة مستخدم',
'تعديل مستخدم',
'حذف مستخدم',

'عرض الصلاحية',
'إضافة صلاحية',
'تعديل صلاحية',
'حذف صلاحية',


];

    $perm = Permission::count();
    if($perm==0)
            foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
            }

}
}
