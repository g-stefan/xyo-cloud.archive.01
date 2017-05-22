<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_mod_HtmlFooter";

class xyo_mod_HtmlFooter extends xyo_Module {

    protected $footer_;
    protected $modJs_;
    protected $jsId_;

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);

        $this->footer_ = array();
        $this->modJs_ = array();
	$this->jsId_=0;
    }

    public function moduleMain() {

        foreach ($this->footer_ as $key1 => $value1) {
            $mod = $this->cloud->isModuleEnabled($key1);
            if ($mod) {
                
            } else {
                unset($this->footer_[$key1]);
            }
        }
        foreach ($this->footer_ as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
                if ($key2 === "js") {
                    foreach ($value2 as $key3 => $value3) {
                        $this->emitJs($key3);
                    }
                }
            }
        }
        foreach ($this->footer_ as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
                if ($key2 === "jsif") {
                    foreach ($value2 as $key3 => $value3) {
                        $this->emitJsIf($key3, $value3);
                    }
                }
            }
        }
        if (count($this->modJs_)) {
            $this->ejsBegin();
            foreach ($this->modJs_ as $js) {
                $mod = &$this->cloud->getModule($js);
                if ($mod) {
                    $mod->htmlHeadJs();
                };
            };
            $this->ejsEnd();
        }

        $js = "";

        foreach ($this->footer_ as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
                if ($key2 === "sjs") {
                    foreach ($value2 as $key3 => $value3) {
                        $js.=$value3."\n";
                    }
                }
            }
        }

        if (strlen($js) > 0) {
            $this->ejsBegin();
            echo $js;
            $this->ejsEnd();
        }
        return true;
    }

    public function emitJs($js) {
        echo "<script src=\"" . $js . "\" ></script>\n";
    }

    public function emitCss($css) {
        echo "<link rel=\"stylesheet\" href=\"" . $css . "\" type=\"text/css\" />\n";
    }

    public function emitJsIf($js, $if_) {
        echo "<!--[if " . $x_if . " ]>\n";
        echo "<script src=\"" . $js . "\" ></script>\n";
        echo "<![endif]-->\n";
    }

    public function emitCssIf($css, $if_) {
        echo "<!--[if " . $if_ . " ]>";
        echo "<link rel=\"stylesheet\" href=\"" . $css . "\" type=\"text/css\" />\n";
        echo "<![endif]-->\n";
    }

    public function emitTitle($name) {
        echo "<title>" . $name . "</title>\n";
    }

    public function emitMeta($type_, $name_, $content_, $extra_) {
        echo "<meta " . $type_ . "=\"" . $name_ . "\" content=\"" . $content_ . "\"";
        if ($extra_) {
            foreach ($extra_ as $key => $value) {
                echo " " . $key . "=\"" . $value . "\"";
            }
        }
        echo " />\n";
    }

    public function emitLink($rel, $href, $type) {
        echo "<link rel=\"" . $rel . "\" href=\"" . $href . "\" type=\"" . $type . "\" />\n";
    }

    public function setModuleJs($module) {
        $this->modJs_[$module] = $module;
    }

    public function set_($module, $mode, $file, $if_) {
        if (array_key_exists($module, $this->footer_)) {
            
        } else {
            $this->footer_[$module] = array();
        }
        if (array_key_exists($mode, $this->footer_[$module])) {
            
        } else {
            $this->footer_[$module][$mode] = array();
        }
        if (array_key_exists($file, $this->footer_[$module][$mode])) {
            return true;
        }
        $this->footer_[$module][$mode][$file] = $if_;
    }

    public function setJs($module, $file) {
        $this->set_($module, "js", $file, true);
    }

    public function setJsIf($module, $file, $if_) {
        $this->set_($module, "jsif", $file, $if_);
    }

    public function jsSource($module, $js) {
        $this->set_($module, "sjs", $this->jsId_, $js);
	++$this->jsId_;
    }

    public function remove($module) {
        if (array_key_exists($module, $this->footer_)) {
            unset($this->footer_[$module]);
        }
    }

}

