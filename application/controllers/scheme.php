<?php

class Scheme_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| Scheme_Controller
	|--------------------------------------------------------------------------
	| 目标部署环境为虚拟主机空间，所以考虑使用简单的数据库创建方式。
	|
	| 本类的作用是直接通过 GET 请求，创建数据库 
	|
	| 创建所有表，以及测试数据 GET /scheme/up 
	| 销毁所有表 GET /scheme/down
	|
	*/

	public function action_index()
	{
		return "Whoops!";
	}
    
    public function action_up()
    {
        $this->create_users();
        $this->create_articles();
        $this->create_article_comments();
        $this->create_news();
        $this->create_news_comments();
        $this->create_groups();
        $this->create_posts();
        $this->create_post_comments();
        
        
        $this->create_test_data();
        
    }
    
    public function action_down()
    {
        Schema::drop('users');
        Schema::drop('articles');
        Schema::drop('article_comments');
        Schema::drop('news');
        Schema::drop('news_comments');
        Schema::drop('groups');
        Schema::drop('posts');
        Schema::drop('post_comments');
        
        echo "Drop all tables!";
    }
    
    public function create_users()
    {
        // TODO: 结构还需完善，需要详细考量
        // MEMO: 关系不考虑实现
        // MEMO: 数据冗余先不考虑
    
        Schema::create('users', function($table) {
            $table->increments('id');
            $table->string('email', 64); // need
            $table->string('password', 64);
            $table->string('username', 32);

            // TODO: 旧密码
            // 兼容旧系统
            $table->string('old_password', 64);
            
            // 权限等级
            // 考虑设置默认值
            // TODO: 0为不活动账号 默认值为1 其他情况按照大小判断
            $table->integer('permission')->default(1);
            
            $table->timestamps();
            
            $table->index('email');
            $table->index('username');
        });
        echo "Create the users table!";
        echo '<br />';
    }
    
    public function create_articles()
    {
        // TODO: 文章 tag
        Schema::create('articles', function($table) {
            $table->increments('id');
            $table->string('title', 128);
            
            $table->integer('author_id');
            $table->string('author', 32);
            
            $table->text('abstract');
            $table->text('content');
    
            $table->timestamps();
            
        });
        echo "Create the articles table!";
        echo '<br />';
        
    }
    
    public function create_article_comments()
    {
        Schema::create('article_comments', function($table) {
            $table->increments('id');
            
            $table->integer('article_id');
            
            $table->integer('author_id');
            $table->string('author', 32);
            
            $table->text('content');
            
            // TODO: 楼层
    
            $table->timestamps();
            
        });
        echo "Create the article_comments table!";
        echo '<br />';
        
    }
    
    public function create_news()
    {
        // 麻痹的， news 不可数名词 
        Schema::create('news', function($table) {
            $table->increments('id');
            
            $table->string('title', 128);
            $table->string('url', 256);
            
            
            $table->integer('courier_id');
            $table->string('courier', 32);
            
            $table->text('abstract'); // 摘要
            
            // TODO: 评论数
    
            $table->timestamps();
            
        });
        echo "Create the news table!";
        echo '<br />';
    }
    
    public function create_news_comments()
    {
        Schema::create('news_comments', function($table) {
            $table->increments('id');
            
            $table->integer('news_id');
            
            $table->integer('author_id');
            $table->string('author', 32);
            
            $table->text('content');
            
            // TODO: 楼层
    
            $table->timestamps();
            
        });
        echo "Create the news_comments table!";
        echo '<br />';
    }
    
    
    public function create_groups()
    {
        Schema::create('groups', function($table) {
            $table->increments('id');
            
            $table->string('name', 128);
            $table->string('pic', 256);
            $table->text('description');
            
            // TODO:组长，管理员，统计数据（冗余数据），
            
    
            $table->timestamps();
            
        });
        echo "Create the groups table!";
        echo '<br />';
        
        
    }
    
    public function create_posts()
    {
        Schema::create('posts', function($table) {
            $table->increments('id');
            
            $table->string('title', 128);
            
            $table->integer('group_id');
            $table->integer('author_id');
            $table->string('author', 32);
            
            // TODO: 楼层冗余数据
            
            $table->text('content');
    
            $table->timestamps();
            
        });
        echo "Create the posts table!";
        echo '<br />';
        
           
    }
    public function create_post_comments()
    {
        // MEMO: 指名回帖使用扁平结构，使用 '@' 通知 
        // TODO: '@' 的实现
        Schema::create('post_comments', function($table) {
            $table->increments('id');
            
            $table->integer('post_id');
            
            $table->integer('author_id');
            $table->string('author', 32);
            
            $table->text('content');
            
            // TODO: 楼层
    
            $table->timestamps();
            
        });
        echo "Create the post_comments table!";
        echo '<br />';
        
    }
    
    
    
    public function create_questions()
    {
        // TODO: 问题数据结构
        
    
    }
    
    
    public function create_answers()
    {
        // TODO: 问题回答数据库结构
        
    
    }
    
    public function create_test_data()
    {
        // 生成测试数据
        
        DB::table('users')->insert(array(
            'email' => 'test@test.com',
            'username' => 'test',
            'password' => Hash::make('test'),
            'permission' => 90,
            
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));        
        echo "Insert test user!";
        echo '<br />';
        
        for ($i=1; $i<=5; $i++) {
            DB::table('articles')->insert(array(
                'title' => "title $i",
                
                'author_id' => 1,
                'author' => 'test',
                
                'abstract' => "abstract $i",
                'content' => "content content content $i",
            ));        
            echo "Insert test articles $i !";
            echo '<br />';
        }
        
        for ($i=1; $i<=5; $i++) {
            DB::table('article_comments')->insert(array(
                'article_id' => 1,
                
                'author_id' => 1,
                'author' => 'test',

                'content' => "article $i comment comment  $i <br/> comment",
                
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ));        
            echo "Insert test article comment $i!";
            echo '<br />';
        }
        
        for ($i=1; $i<=5; $i++) {
            DB::table('news')->insert(array(
                'title' => "news title $i",
                'url' => "http://news_url",
                
                'courier_id' => 1,
                'courier' => 'test',

                'abstract' => "news abstract $i ",
                
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ));        
            echo "Insert test news $i!";
            echo '<br />';
        }
        
        for ($i=1; $i<=5; $i++) {
            DB::table('news_comments')->insert(array(
                'news_id' => 1,
                
                'author_id' => 1,
                'author' => 'test',

                'content' => "news content $i ",
                
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ));        
            echo "Insert test news comment $i!";
            echo '<br />';
        }
        
        for ($i=1; $i<=5; $i++) {
            DB::table('groups')->insert(array(
                'name' => '测试小组',
                'pic' => 'http://img1.guokr.com/thumbnail/I17VQsuxs02tsUqcCcLMLqbDKM7XEh4NDzNZA1gMWHgwAAAAMAAAAEpQ_48x48.jpg',
                'description' => "测试小组描述<br />换行换行",
                
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ));        
            echo "Insert test group $i!";
            echo '<br />';
        }
        
        for ($i=1; $i<=10; $i++) {
            DB::table('posts')->insert(array(
                'title' => "post title $i",
                
                'group_id' => 1,
                'author_id' => 1,
                'author' => 'test',

                'content' => "post $i content content content $i <br/> post content content content",
                
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ));        
            echo "Insert test post $i!";
            echo '<br />';
        }
        
        for ($i=1; $i<=5; $i++) {
            DB::table('post_comments')->insert(array(
                'post_id' => 1,
                
                'author_id' => 1,
                'author' => 'test',

                'content' => "post $i comment comment  $i <br/> comment",
                
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ));        
            echo "Insert test post comment $i!";
            echo '<br />';
        }
        
        
    }
    

}