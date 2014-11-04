<?php

class TableSeeder extends Seeder {
    
    public function run() {

        DB::table('user')->delete();

        User::create([
            'email' => 'test@test.com',
            'name' => 'test',
            'password' => Hash::make('test'),
        ]);

        User::create([
            'email' => 'test1@test.com',
            'name' => 'test1',
            'password' => Hash::make('test1'),
            'status' => 'editor'
        ]);


        DB::table('article')->delete();

        for ($i = 1; $i <= 5; $i++) {
            Article::create([

                'user_id' => 1,
                'title' => "测试文章标题$i",
                'content' => "测试文章内容，测试文章内容，测试文章内容，测试文章内容，测试文章内容，测试文章内容，",
                'status' => 'published',
                'published_at' => date("Y-m-d H:i:s"),

            ]);
        }

        DB::table('article_category')->delete();

        for ($i = 1; $i <= 5; $i++) {
            ArticleCategory::create([
                'name' => "测试分类$i",
            ]);
        }

        DB::table('comment')->delete();

        for ($i = 1; $i <= 5; $i++) {
            Comment::create([
                'topic_id' => 1,
                'user_id' => 1,
                'content' => "测试评论{$i}，测试评论{$i}，测试评论{$i}，测试评论{$i}，测试评论{$i}，",
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Comment::create([
                'topic_id' => 2,
                'user_id' => 1,
                'content' => "测试评论{$i}，测试评论{$i}，测试评论{$i}，测试评论{$i}，测试评论{$i}，",
            ]);
        }


        DB::table('news')->delete();

        for ($i = 1; $i <= 5; $i++) {
            News::create([
                'title' => "测试新闻标题$i",
                'source' => 'http://test.com/test',
                'content' => "测试新闻内容，测试新闻内容，测试新闻内容$i",
            ]);
        }



    }

}