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

### 需要用 富文本 的内容实体

- Article
- Question
- Answer
- Post

### 编辑器（问题、评论）

pagedown + mathjax + pagedown-extra

### 后端 markdown parser

https://github.com/erusev/parsedown-extra


### 标签

tagmanager

### 头像上传

Jasny Bootstrap


### 前端验证

// @todo: 

http://reactiveraven.github.io/jqBootstrapValidation/

http://1000hz.github.io/bootstrap-validator/

### 代码高亮

highlightjs

### 日期选取

// @todo

### minify

https://github.com/ceesvanegmond/minify

考虑 fork 重写

- 缓存？

## 数据架构

### 用户


```
user
    email
    name
    password

    avatar
    descr
    
    is_confirmed

    status
        - member
        - editor
        - admin


```

### 文章

```
article
    user_id

    title
    subtitle
    thumbnail

    abstract
    content
    markdown

    status
        - draft
        - published
        - dropped

    topic_id

    published_at
```

### 文章分类

```
category
    name
    parent_id
    order
```

### 快讯 

```
news
    user_id

    title
    source
    content

    status
        - published
        - dropped

    topic_id
```

### 问题

```
question
    user_id

    title
    content
    markdown

    status
        - published
        - dropped

    topic_id
```

### 回答

```
answer
    question_id
    user_id

    content
    markdown

    vote_count

    topic_id
```

### 评论主题

```
topic
    title

    // @todo floor_count
```

### 评论

```
comment
    topic_id
    user_id
    content
    markdown

    // @todo floor
    // @todo digg_count
```

### 群组

```
group
    name
    thumbnail

    descr

    order

    discuss_id
```

### 讨论主题

```
discuss
    title
```

### 讨论帖子

```
post
    discuss_id

    user_id

    title
    content
    markdown

    status
        - published
        - dropped

    topic_id
```

### 活动

```
activity

    title
    thumbnail
    abstract
    content
    markdown

    series_id
    began_at
    ended_at
    member_count

    status
        - published
        - dropped

    topic_id
```

### 活动系列

```
series
    name
    order
```


### 标签

```
tag
    name
```

### 反馈

```
feedback
    name
    email
    content
```

## 关系

### 文章与标签

article_tag


### 新闻与标签（没有对用户输入开放）

news_tag

### 新闻与顶（与用户）

news_digg

### 问题与标签

question_tag

### 问题与顶

question_digg

### 回答与态度

answer_attitude
    user_id
    answer_id
    type
        - approve
        - oppose

### 活动与标签

activity_tag

### 活动与用户（参加）

activity_user

    is_confirmed // 确认是否参加会议（可以使用邮件方式确认）


