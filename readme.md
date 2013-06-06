# Distribution

统计之都网站

## Tasks

Github issues

## 路线图

Trello

## 设计

https://github.com/cosname/admin/blob/master/CEP/cep-002.md

## 技术

### 技术选型

php

mysql

## 开发

遵循 git flow 版本管理模型。

所有的开发工作都在 develop 分支上展开， master 分支每个点都是发布版本。

修改， autoload class 如 controllers类，独立目录的 viewcomposers 类（在项目 composer.json 中） 以后，执行 php composer.phar update 会更新 classmap ，也会升级所有依赖。

### 开发环境搭建

    #只适用于 Ubuntu server 12.04 LTS
    wget -O - https://raw.github.com/Gwill/distribution/develop/dev_deploy.sh|sudo sh

稍等片刻，访问 http://127.0.0.1:9527/ 即可。

## 致谢

感谢 @Willerce 同学作为人肉 JS 文档的鼎力帮助。

## Version

laravel-v4

laravel-administrator-v4.0.0

bootstrap-v2.3.0

## License 

GPL v3 ( http://www.gnu.org/licenses/gpl-3.0.html )