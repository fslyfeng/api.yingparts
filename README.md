# api.yingparts.com

## 运行

    php think run

## 生成 api 控制器

    php think make:controller `controllerName` --api

## 安装本地 MSSQL 服务

    brew install brew-php-switcher
    brew install php@7.2

    /usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
    brew tap microsoft/mssql-release https://github.com/Microsoft/homebrew-mssql-release
    brew update

    HOMEBREW_NO_ENV_FILTERING=1 ACCEPT_EULA=Y brew install msodbcsql17 mssql-tools

    sudo pecl install sqlsrv
    sudo pecl install pdo_sqlsrv
