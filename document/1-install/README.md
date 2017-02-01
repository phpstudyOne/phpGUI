安装篇
=====

phpgtk 目前支持 windows、mac、linux 系统。

##一.windows安装
####1.进入到[gtk下载链接](http://gtk.php.net/download.php)下载

![download](https://raw.githubusercontent.com/phpstudyOne/phpGUI/install/document/1-install/download.png)

下载第一个binaries(二进制文件)就行。
当然如果你要下载source(源码文件)自己编译也行~
下载好的文件结构：

![binaries](https://raw.githubusercontent.com/phpstudyOne/phpGUI/install/document/1-install/binaries.png)

其中的demos是官方提供的一些案列，可以直接运行。其他的文件和我们安装的php文件没啥区别，多了一些dll文件。
####2.将下载的文件解压到你想要放的任何地方，再把php.exe 添加到环境变量
把php.exe 添加到环境变量并不是必须的，只是为了方便使用php.exe运行我们的代码。
为了和我已经安装的php区分开来，我把 php-gui/php.exe 重命名为 phpgui.exe
为了防止界面上写中文出现乱码，我们可以修改 `php-gui/PHP55-GTK2` 下的 
`php-gtk.codepage = CP1250` 为  `php-gtk.codepage = UTF-8`
####3.测试是否安装成功
cmd下输入命令
```sh
c:\php-gui\PHP-GTK2\demos\components>phpgui colorselector.php
```
如果一切正常，则会出现

![test](https://raw.githubusercontent.com/phpstudyOne/phpGUI/install/document/1-install/test.png)

##二.mac安装
(暂缺)
##三.linux安装
(暂缺)
