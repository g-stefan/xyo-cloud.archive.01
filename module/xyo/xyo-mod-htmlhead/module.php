<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_mod_HtmlHead";

class xyo_mod_HtmlHead extends xyo_Module {

    protected $head_;
    protected $modJs_;
    protected $modCss_;
    protected $documentTitle_;
    protected $jsId_;


    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);

        $this->documentTitle_ = null;
        $this->head_ = array();
        $this->modJs_ = array();
        $this->modCss_ = array();
    	$this->jsId_=0;

    }

    public function moduleMain() {
        foreach ($this->head_ as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
                if ($key2 === "mhe") {
                    foreach ($value2 as $key3 => $value3) {
                        $this->emitMeta("name", $key3, $value3[0], $value3[1]);
                    }
                }
            }
        }

        foreach ($this->head_ as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
                if ($key2 === "mn") {
                    foreach ($value2 as $key3 => $value3) {
                        $this->emitMeta("name", $key3, $value3[0], $value3[1]);
                    }
                }
            }
        }

        if ($this->documentTitle_) {
            $this->emitTitle($this->documentTitle_);
        }

        foreach ($this->head_ as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
                if ($key2 === "lnk") {
                    foreach ($value2 as $key3 => $value3) {
                        $this->emitLink($value3[0], $key3, $value3[1]);
                    }
                }
            }
        }

        foreach ($this->head_ as $key1 => $value1) {
            $mod = $this->cloud->isModuleEnabled($key1);
            if ($mod) {
                
            } else {
                unset($this->head_[$key1]);
            }
        }
        foreach ($this->head_ as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
                if ($key2 === "css") {
                    foreach ($value2 as $key3 => $value3) {
                        $this->emitCss($key3);
                    }
                }
            }
        }
        foreach ($this->head_ as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
                if ($key2 === "cssif") {
                    foreach ($value2 as $key3 => $value3) {
                        $this->emitCssIf($key3, $value3);
                    }
                }
            }
        }
        if (count($this->modCss_)) {
            echo "<style type=\"text/css\">\n";
            foreach ($this->modCss_ as $css) {
                $mod = &$this->cloud->getModule($css);
                if ($mod) {
                    $mod->htmlHeadCss();
                }
            }
            echo "\n</style>\n";
        }
        foreach ($this->head_ as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
                if ($key2 === "js") {
                    foreach ($value2 as $key3 => $value3) {
                        $this->emitJs($key3);
                    }
                }
            }
        }
        foreach ($this->head_ as $key1 => $value1) {
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

        foreach ($this->head_ as $key1 => $value1) {
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
            echo $this->js;
            $this->ejsEnd();
        }
        return true;
    }

    public function emitJs($js) {
        echo "<script type=\"text/javascript\" src=\"" . $js . "\" ></script>\n";
    }

    public function emitCss($css) {
        echo "<link rel=\"stylesheet\" href=\"" . $css . "\" type=\"text/css\" />\n";
    }

    public function emitJsIf($js, $if_) {
        echo "<!--[if " . $x_if . " ]>\n";
        echo "<script type=\"text/javascript\" src=\"" . $js . "\" ></script>\n";
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

    public function setModuleCss($module) {
        $this->modCss_[$module] = $module;
    }

    public function set_($module, $mode, $file, $if_) {
        if (array_key_exists($module, $this->head_)) {
            
        } else {
            $this->head_[$module] = array();
        }
        if (array_key_exists($mode, $this->head_[$module])) {
            
        } else {
            $this->head_[$module][$mode] = array();
        }
        if (array_key_exists($file, $this->head_[$module][$mode])) {
            return true;
        }
        $this->head_[$module][$mode][$file] = $if_;
    }

    public function setJs($module, $file) {
        $this->set_($module, "js", $file, true);
    }

    public function setCss($module, $file) {
        $this->set_($module, "css", $file, true);
    }

    public function setJsIf($module, $file, $if_) {
        $this->set_($module, "jsif", $file, $if_);
    }

    public function setCssIf($module, $file, $if_) {
        $this->set_($module, "cssif", $file, $if_);
    }

    public function jsSource($module, $js) {
        $this->set_($module, "sjs", $this->jsId_, $js);
	++$this->jsId_;
    }

    public function remove($module) {
        if (array_key_exists($module, $this->head_)) {
            unset($this->head_[$module]);
        }
    }

    public function setTitle($name) {
        $this->documentTitle_ = $name;
    }

    public function getTitle() {
        return $this->documentTitle_;
    }

    public function setMetaName($module, $name, $content, $extra_=null) {
        $this->set_($module, "mn", $name, array($content, $extra_));
    }

    public function setMetaHttpEquiv($module, $name, $content, $extra_=null) {
        $this->set_($module, "mhe", $name, array($content, $extra_));
    }

    public function setLink($module, $rel, $href, $type) {
        $this->set_($module, "lnk", $href, array($rel, $type));
    }

}

