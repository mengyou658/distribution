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
        
    }
    
    public function action_down()
    {
        Schema::drop('users');
        Schema::drop('articles');
        
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
            
            $table->timestamps();
            
            $table->index('email');
            $table->index('username');
        });
        echo "Create the users table!";
        echo '<br />';
        
        DB::table('users')->insert(array(
            'email' => 'test@test.com',
            'username' => 'test',
            'password' => Hash::make('test'),
            
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ));        
        echo "Insert test user!";
        echo '<br />';
        
    }
    
    public function create_articles()
    {
        // TODO: 文章表结构
        // TODO: 文章分类
        // MEMO: 文章 tag 不考虑实现
        Schema::create('articles', function($table) {
            $table->increments('id');
            $table->string('title', 128);
            
            $table->integer('author_id');
            $table->string('author_name', 32);
            
            $table->text('abstract');
            $table->text('content');
    
            $table->timestamps();
            
        });
        echo "Create the articles table!";
        echo '<br />';
        
        for ($i=1; $i<=5; $i++) {
            DB::table('articles')->insert(array(
                'title' => "title $i",
                
                'author_id' => 1,
                'author_name' => 'test',
                
                'abstract' => "abstract $i",
                'content' => "content content content $i",
            ));        
            echo "Insert test articles $i !";
            echo '<br />';
        }
    }
    
    public function create_article_comments()
    {
        // TODO: 文章表评论结构
        // 
    
    }
    
    public function create_groups()
    {
        // TODO: 小组数据结构
        
    
    }
    
    public function create_posts()
    {
        // TODO: 小组帖子数据结构
        
    
    }
    public function create_post_comments()
    {
        // TODO: 小组帖子评论回复数据结构
        // MEMO: 指名回帖使用扁平结构，使用 '@' 通知 
        // TODO: '@' 的实现
        
    }
    
    
    
    public function create_questions()
    {
        // TODO: 问题数据结构
        
    
    }
    
    
    public function create_answers()
    {
        // TODO: 问题回答数据库结构
        
    
    }
    
    
    

}