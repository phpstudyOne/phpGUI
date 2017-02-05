hello world basic 篇
===================

学习新的语言，第一个运行实例，必须是 hello world 的啦。
编写我们的代码 example_2.1.php

``` php
if (!class_exists('gtk')) {
    die("Please load the php-gtk2 module in your php.ini\r\n");
}

$wnd = new GtkWindow();
$wnd->set_title('Hello world');
$wnd->connect_simple('destroy', array('gtk', 'main_quit'));

$lblHello = new GtkLabel("Just wanted to say\r\n'Hello world!'");
$wnd->add($lblHello);

$wnd->show_all();
Gtk::main();
```

运行它，看看效果：
![example_2.1.php](https://raw.githubusercontent.com/phpstudyOne/phpGUI/hello_world_basic/document/2-hello_world_basic/images/example_2.1.png)