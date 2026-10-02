<?php
namespace Database\Seeders;
use App\Models\User; use Illuminate\Database\Seeder; use Illuminate\Support\Facades\DB; use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder { public function run(): void {
$user=User::updateOrCreate(['id'=>1],['username'=>'nexarion.owner','password'=>Hash::make('nexarion2026')]);
DB::table('site_settings')->updateOrInsert(['id'=>1],['email'=>'[COMPANY_EMAIL]','whatsapp'=>'[WHATSAPP]','instagram'=>'[INSTAGRAM]','linkedin'=>'[LINKEDIN]','address'=>'[OFFICE_ADDRESS]','hours'=>'Mon – Fri, 09.00 – 18.00','maintenance'=>0,'maintenance_message'=>'We are upgrading our systems to serve you better. We will be back online shortly — thank you for your patience.','created_at'=>now(),'updated_at'=>now()]);
$content=json_decode(file_get_contents(database_path('seeders/data/content.json')),true,512,JSON_THROW_ON_ERROR);
DB::table('content_items')->delete();
foreach($content as $module=>$items){ foreach(array_values($items) as $i=>$item){$uid=$item['id'] ?? $module.'-'.($i+1); unset($item['id']); DB::table('content_items')->insert(['uid'=>$uid,'module'=>$module,'sort_order'=>$i,'data'=>json_encode($item,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES),'created_at'=>now(),'updated_at'=>now()]);}}
DB::table('messages')->delete();
DB::table('messages')->insert([
['uid'=>'sample-budi','from_name'=>'[SAMPLE] Budi Santoso','email'=>'budi@example.com','subject'=>'Website untuk UMKM kopi','body'=>'Halo, saya punya brand kopi lokal dan ingin website company profile sederhana + katalog produk. Kira-kira berapa estimasi biaya dan waktunya? Terima kasih.','is_read'=>0,'is_starred'=>1,'created_at'=>now()->subHours(5),'updated_at'=>now()->subHours(5)],
['uid'=>'sample-sarah','from_name'=>'[SAMPLE] Sarah Lim','email'=>'sarah@company.co','subject'=>'Redesign dashboard internal','body'=>'Kami butuh bantuan meredesain dashboard operasional internal. Bisa jadwalkan discovery call minggu depan?','is_read'=>1,'is_starred'=>0,'created_at'=>now()->subDays(2),'updated_at'=>now()->subDays(2)]
]);
DB::table('notices')->delete(); DB::table('activities')->delete(); DB::table('activities')->insert(['type'=>'system','message'=>'Workspace initialized','occurred_at'=>now(),'created_at'=>now(),'updated_at'=>now()]);
}}
