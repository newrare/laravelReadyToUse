<?php

namespace App\Http\Classes;

class ViewElement
{
    public static function allViewName()
    {
        return array(
            "error",
            "template",
            "pageError",
            "notJavascript",
            "view",
            "home",
            "connection",
            "account",
            "accountOption",
            "contact",
            "lost",
            "service",
        );
    }

    public static function getData($view)
    {
        if($view == "error")
        {
            return array(
                "200"   => trans("error.200"),  //ok but without popup message
                "202"   => trans("error.202"),  //ok with popup message
                "204"   => trans("error.204"),  //ok with send mail
                "400"   => trans("error.400"),
                "401"   => trans("error.401"),
                "403"   => trans("error.403"),
                "404"   => trans("error.404"),
                "405"   => trans("error.405"),
                "409"   => trans("error.409"),
                "503"   => trans("error.503")
            );
        }
        elseif($view == "template")
        {
            return array(
                "active"            => $_SERVER['REQUEST_URI'],
                "service"           => trans("service.titlePage"),
                "accountOption"     => trans("accountOption.titlePage"),
                "home"              => trans("template.home"),
                "logOut"            => trans("template.logOut"),
                "language"          => trans("template.language"),
                "menu"              => trans("template.menu"),
                "error"             => trans("template.error"),
                "doing"             => trans("template.doing"),
                "or"                => trans("template.or"),
                "empty"             => trans("template.empty"),
                "googleConnection"  => trans("template.googleConnection"),
                "buttonAddAccount"  => trans("button.addAccount"),
                "buttonConnection"  => trans("button.connection"),
                "save"              => trans("template.save"),
                "langValue"         => trans("template.langValue"),
                "contact"           => trans("contact.subContact"),
                "lostPassword"      => trans("lost.titlePage"),
            );
        }
        elseif($view == "pageError")
        {
            return array(
                "titlePage" => trans("pageError.titlePage")
            );
        }
        elseif($view == "notJavascript")
        {
            return array(
                "titlePage"     => trans("notJavascript.titlePage"),
                "titleMessage"  => trans("notJavascript.titleMessage")
            );
        }
        elseif($view == "view")
        {
            return array(
                "titlePage"     => trans("view.titlePage"),
                "titleMessage"  => trans("view.titleMessage"),
                "key"           => trans("view.key"),
                "value"         => trans("view.value")
            );
        }
        elseif($view == "home")
        {
            return array(
                "titlePage"         => trans("home.titlePage"),
                "titleMessage"      => trans("home.titleMessage"),
                "titleAction"       => trans("home.titleAction"),
                "soon"              => trans("home.soon"),
                "textApplication"   => trans("home.textApplication"),
                "textAndroid"       => trans("home.textAndroid"),
                "subService"        => trans("home.subService"),
                "textService"       => trans("home.textService"),
                "subCloud"          => trans("home.subCloud"),
                "textCloud"         => trans("home.textCloud"),
                "subLang"           => trans("home.subLang"),
                "textLang"          => trans("home.textLang"),
                "subDatabase"       => trans("home.subDatabase"),
                "textDatabase"      => trans("home.textDatabase"),
                "subApi"            => trans("home.subApi"),
                "textApi"           => trans("home.textApi"),
                "subSocial"         => trans("home.subSocial"),
                "textSocial"        => trans("home.textSocial"),
                "subResponsive"     => trans("home.subResponsive"),
                "textResponsive"    => trans("home.textResponsive"),
                "subFaq"            => trans("faq.subFaq"),
                "faqQ1"             => trans("faq.q1"),
                "faqR1"             => trans("faq.r1"),
                "faqQ2"             => trans("faq.q2"),
                "faqR2"             => trans("faq.r2"),
                "subAboutUs"        => trans("home.subAboutUs"),
                "textAboutUs"       => trans("home.textAboutUs"),
                "subContact"        => trans("contact.subContact"),
                "textContactMail"   => trans("contact.textContactMail"),
                "textContactSub"    => trans("contact.textContactSub"),
                "textContactMess"   => trans("contact.textContactMess"),
                "subLegal"          => trans("home.subLegal"),
                "textLegal"         => trans("home.textLegal"),
                "connectionLogin"   => trans("connection.login"),
                "connectionPass"    => trans("connection.pass"),
                "buttonConnection"  => trans("button.connection"),
                "buttonRegister"    => trans("button.register"),
                "buttonDownload"    => trans("button.download"),
                "buttonSend"        => trans("button.send")
            );
        }
        elseif($view == "connection")
        {
            return array(
                "titlePage"         => trans("connection.titlePage"),
                "titleMessage"      => trans("connection.titleMessage"),
                "connectionLogin"   => trans("connection.login"),
                "connectionPass"    => trans("connection.pass"),
                "buttonConnection"  => trans("button.connection")
            );
        }
        elseif($view == "account")
        {
            return array(
                "titlePage"         => trans("account.titlePage"),
                "titleMessage"      => trans("account.titleMessage"),
                "titleCreate"       => trans("account.titleCreate"),
                "connectionLogin"   => trans("connection.login"),
                "connectionPass"    => trans("connection.pass"),
                "registerEmail"     => trans("account.email"),
                "buttonRegister"    => trans("button.register")
            );
        }
        elseif($view == "accountOption")
        {
            return array(
                "titlePage"             => trans("accountOption.titlePage"),
                "titleMessage"          => trans("accountOption.titleMessage"),
                "clickForValidEmail"    => trans("accountOption.clickForValidEmail"),
                "email"                 => trans("accountOption.email"),
                "emailNoValid"          => trans("accountOption.emailNoValid"),
                "avatar"                => trans("accountOption.avatar"),
                "sharing"               => trans("accountOption.sharing"),
                "yes"                   => trans("accountOption.yes"),
                "no"                    => trans("accountOption.no"),
                "lang"                  => trans("accountOption.lang"),
                "connectionPass"        => trans("connection.pass"),
                "buttonRegister"        => trans("button.save")
            );
        }
        elseif($view == "contact")
        {
            return array(
                "titlePage"         => trans("contact.subContact"),
                "titleMessage"      => trans("contact.titleMessage"),
                "subContact"        => trans("contact.subContact"),
                "textContactMail"   => trans("contact.textContactMail"),
                "textContactSub"    => trans("contact.textContactSub"),
                "textContactMess"   => trans("contact.textContactMess"),
                "buttonSend"        => trans("button.send")
            );
        }
        elseif($view == "lost")
        {
            return array(
                "titlePage"     => trans("lost.titlePage"),
                "titleMessage"  => trans("lost.titleMessage"),
                "email"         => trans("account.email"),
                "buttonSend"    => trans("button.send")
            );
        }
        elseif($view == "service")
        {
            return array(
                "titlePage"     => trans("service.titlePage"),
                "titleMessage"  => trans("service.titleMessage"),
            );
        }
        else
        {
            return array();
        }
    }
}
