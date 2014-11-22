# 信息架构

## 数据架构

### 用户


```
user
    email
    name
    password

    nickname
    avatar
    descr
    website
    sex
        - unknow
        - male
        - female
    
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

    floor_count
```

### 评论

```
comment
    topic_id
    user_id
    content
    markdown

    floor
    digg_count
```

### 群组

```
group
    name
    thumbnail

    short_descr
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

### 附件

```
attachment

    name
    
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



