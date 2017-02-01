<?php
error_reporting(E_ALL);

class PhpEditWidget extends GtkSourceView {  // Note 1
  protected $buffer;                        // note 5
  protected $lang;
  protected $mime_lang;

  function __construct() {
    parent::__construct();  // note 2

    # default lang
    $this->mime_lang = 'text/x-php-source';    // note 3
    $this->set_lang($this->mime_lang);        // note 3

    $this->buffer = new GtkSourceBuffer();     // note 4, note 5
    $this->set_buffer($this->buffer);              // note 4

    $this->set_show_line_numbers(true);
    $this->set_show_line_markers(true);

    $this->buffer->set_language($this->lang);
    $this->buffer->set_highlight(true);
  }

  protected function set_lang($mime_type) {      // note 3
    $lang_manager = new GtkSourceLanguagesManager();
    $this->lang = $lang_manager->get_language_from_mime_type($mime_type);
  }

  public function load_file($file) {    // note 6
    if (!file_exists($file))
      return false;

    $lines = file_get_contents($file);

    $this->buffer->begin_not_undoable_action();  // note 8
    $this->buffer->set_text($lines);   // note 7
    $this->buffer->end_not_undoable_action();   // note 8
    return true;
  }

  function split() {                               // note 9
    $edit = new PhpEditWidget();
    $edit->set_buffer($this->get_buffer());
    return $edit;
  }
} // end of class PhpEditWidget

/**
* In this part of the code, indenting matches the
* widgets containment, not the code structure
*/
$win = new GtkWindow();
  $vbox = new GtkVPaned();
    $win->add($vbox);
      $scrolled_win = new GtkScrolledWindow();
      $scrolled_win->set_policy(Gtk::POLICY_AUTOMATIC, Gtk::POLICY_AUTOMATIC);
      $vbox->add1($scrolled_win);
 
        $php_edit = new PhpEditWidget();
        $php_edit->load_file(__FILE__);
        $scrolled_win->add_with_viewport($php_edit);    // note 1

      # test for a split-window like feature       // note 9
      $scrolled_win = new GtkScrolledWindow();
      $scrolled_win->set_policy(
        Gtk::POLICY_AUTOMATIC,
        Gtk::POLICY_AUTOMATIC);
 
      $vbox->add2($scrolled_win);
        $scrolled_win->add_with_viewport($php_edit->split());   // note 9

$win->set_size_request(400, 600);
$win->maximize();
$win->set_position(Gtk::WIN_POS_CENTER);

$win->show_all();
$win->set_title("PhpEditWidget - demo");
$win->connect_simple("destroy", array("Gtk", "main_quit"));

Gtk::main();
?>