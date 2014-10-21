# Distribution 开发文档

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
