# Distribution 开发文档


## @todo

- admin 中有 valid 相关配置吗？

## 旧站文章转移思路

- 用 xml 导出（wp自带工具）
- 写个脚本导入 mysql （单表，结构随意），考虑到 mysql 连接库的问题，用 php 实现，注意超时问题
    - 关键的字段
        - 发布时间
        - 内容
        - 摘要（用切割 <!-- more --> 的办法尝试？）


- 将库放上线，使用 phpmyadmin 导入主库

- 将以前的上传附件，转移到新站点，即 /wp-content/upload



## 输入组件

### 编辑器（问题、评论）

pagedown + mathjax

寻找方案

### 标签

寻找方案

### 头像上传

寻找方案

## 数据架构

### 用户

```
user
    email
    name
    password

    avatar
    descr
    
    status

```

### 文章

article
    user_id

    title
    subtitle
    thumbnail

    abstract
    content

    status

    topic_id

    published_at

### 文章分类

aritcle_category
    name
    parent_id

### 快讯 

news
    user_id

    title
    source
    content

    topic_id

### 问题

question
    user_id

    title
    content

    topic_id


### 回答

answer
    question_id
    user_id

    content
    vote_count

    topic_id

### 评论主题

topic
    title

### 评论

comment
    topic_id
    user_id
    content

    // @todo digg_count

### 群组

group
    name
    thumbnail

    descr

    discuss_id

### 讨论主题

discuss
    title

### 讨论帖子

post
    discuss_id

    user_id

    title
    content

### 活动

activity
    
    title

    abstract
    content

    began_at
    ended_at

    topic_id


### 标签

tag
    name

### 反馈

feedback
    name
    email
    content

## 关系

### 文章与标签

### 新闻与标签

### 活动与标签

### 群组与用户 //@todo

### 活动与用户
