<?php

use Illuminate\Database\Seeder;
use App\News;
use App\NewsType;
use App\Account;
use Carbon\Carbon;
use App\Documents;
use App\DocumentsType;
use App\FeedBacks;
use App\Introduces;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**  run php artisan db:seed
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        if (NewsType::count() == 0) {
            $newsType = new NewsType();
            $newsType->nameType = "Tin Thể Thao";
            $newsType->slug_newtype = Str::slug("Tin Thể Thao");
            $newsType->save();
        }

        if (Account::count() == 0) {
            $account = new Account();
            $account->fullname = "ten day du";
            $account->email = "huy@gmail.com";
            $account->phone = "2323232";
            $account->username = Str::random(10)."huy";
            $account->password = Hash::make('123456');
            $account->save();
        }
        
        
        if (News::count() == 0) {
            $news = new News();
            $news->description = "Tieu De 1";
            $news->slug_description = Str::slug("Tieu De 1");
            $news->newsType_id = 1;
            $news->account_id = 1;
            $news->content= "Noi dung 1";
            $news->urlimage = "url";
            $news->dateCreateNew = Carbon::now();
            $news->save();
        }

        if (DocumentsType::count() == 0) {
            $docmentstype = new DocumentsType();
            $docmentstype->name_type_document = "Sách VĂn Học";
            $docmentstype->slug_name_type_document =  Str::slug("Sách VĂn Học");
            $docmentstype->save();
        }

        if (Documents::count() == 0) {
            $docments = new Documents();
            $docments -> documentstype_id = 1;
            $docments -> account_id = 1;
            $docments->name_documents = "Ten Tai Lieu";
            $docments->slug_name_documents = Str::slug("Ten Tai Lieu");
            $docments->url_documents = "Ten Tai Lieu";
            $docments->save();
        }

        if (FeedBacks::count() == 0) {
            $feedBacks = new FeedBacks();
            $feedBacks -> email = 1;
            $feedBacks -> fullName = 1;
            $feedBacks->content = "Ten Tai Lieu";
            $feedBacks->save();
        }

        if (Introduces::count() == 0) {
            $introduces = new Introduces();
            $introduces -> description = 'Huân Huy Chương';
            $introduces -> slug_description = Str::slug('Huân Huy Chương');
            $introduces-> content = "Ten Tai Lieu";
            $introduces->account_id = 1;
            $introduces->save();
        }

        



        

    }
}
