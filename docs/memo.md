# 备忘录

MEMO


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