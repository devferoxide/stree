<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Devferoxide\Stree\Service\Str;

class Stree
{
    public function preg_replace_array()
    {
        $string = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        $pattern = ee()->TMPL->fetch_param('pattern');
        $replacements = explode('|', ee()->TMPL->fetch_param('replacements'));

        return preg_replace_array($pattern, $replacements, $string);
    }

    public function after()
    {
        $string = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        $search = ee()->TMPL->fetch_param('search');

        return Str::after($string, $search);
    }

    public function after_last()
    {
        $string = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        $search = ee()->TMPL->fetch_param('search');

        return Str::afterLast($string, $search);
    }

    public function ascii()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        return Str::ascii($subject);
    }

    public function before()
    {
        $string = ee()->TMPL->tagdata;
        $search = ee()->TMPL->fetch_param('search');

        return Str::before($string, $search);
    }

    public function before_last()
    {
        $string = ee()->TMPL->tagdata;
        $search = ee()->TMPL->fetch_param('search');

        return Str::afterLast($string, $search);
    }

    public function between()
    {
        $string = ee()->TMPL->tagdata;
        $start = ee()->TMPL->fetch_param('start');
        $end = ee()->TMPL->fetch_param('end');

        return Str::between($string, $start, $end);
    }

    public function camel()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;

        return Str::camel($subject);
    }

    public function contains()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        $needle = explode('|', ee()->TMPL->fetch_param('needle'));

        return Str::contains($subject, $needle) ? 'yes' : 'no';
    }

    public function contains_all()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        $needle = explode('|', ee()->TMPL->fetch_param('needle'));

        return Str::containsAll($subject, $needle) ? 'yes' : 'no';
    }

    public function ends_with()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        $needle = explode('|', ee()->TMPL->fetch_param('needle'));

        return Str::endsWith($subject, $needle) ? 'yes' : 'no';
    }

    public function finish()
    {
        $cap = ee()->TMPL->fetch_param('cap');
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;

        return Str::finish($subject, $cap);
    }

    public function is()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        $pattern = ee()->TMPL->fetch_param('pattern');
        return Str::is($pattern, $subject) ? 'yes' : 'no';
    }

    public function is_ascii()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        return Str::isAscii($subject) ? 'yes' : 'no';
    }

    public function is_uuid()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        return Str::isUuid($subject) ? 'yes' : 'no';
    }

    public function kebab()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;

        return Str::kebab($subject);
    }

    public function length()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;

        return Str::length($subject);
    }

    public function limit()
    {
        $subject = strip_tags(ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata);
        $count = ee()->TMPL->fetch_param('count');
        $prefix = ee()->TMPL->fetch_param('prefix', ' ...');

        return Str::limit($subject, $count, $prefix);
    }

    public function lower()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;

        return Str::lower($subject);
    }

    public function order_uuid()
    {
        return (string) Str::orderedUuid();
    }

    public function plural()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        $count = ee()->TMPL->fetch_param('count', 2);
        return Str::plural($subject, $count);
    }

    public function random()
    {
        $length = ee()->TMPL->fetch_param('length', 16);
        return Str::random($length);
    }

    public function replace_array()
    {
        $string = ee()->TMPL->tagdata;
        $pattern = ee()->TMPL->fetch_param('pattern');
        $replacements = explode('|', ee()->TMPL->fetch_param('replacements'));

        return Str::replaceArray($pattern, $replacements, $string);
    }

    public function replace_first()
    {
        $string = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        $search = ee()->TMPL->fetch_param('search');
        $replace = ee()->TMPL->fetch_param('replace');

        return Str::replaceFirst($search, $replace, $string);
    }

    public function replace_last()
    {
        $string = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        $search = ee()->TMPL->fetch_param('search');
        $replace = ee()->TMPL->fetch_param('replace');

        return Str::replaceLast($search, $replace, $string);
    }

    public function singular()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        $count = ee()->TMPL->fetch_param('count', 1);
        return Str::singular($subject, $count);
    }

    public function slug()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        $separator = ee()->TMPL->fetch_param('separator', '-');
        return Str::slug($subject, $separator);
    }

    public function snake()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        return Str::snake($subject);
    }

    public function start()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        $prefix = ee()->TMPL->fetch_param('prefix');
        return Str::start($subject, $prefix);
    }

    public function starts_with()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        $needle = ee()->TMPL->fetch_param('needle');
        return Str::startsWith($subject, $needle) ? 'yes' : 'no';
    }

    public function studly()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        return Str::studly($subject);
    }

    public function substr()
    {
        $string = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        $from = ee()->TMPL->fetch_param('from');
        $to = ee()->TMPL->fetch_param('to', null);

        return Str::substr($string, $from, $to);
    }

    public function title()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        return Str::title($subject);
    }

    public function ucfirst()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        return Str::ucfirst($subject);
    }

    public function upper()
    {
        $subject = ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata;
        return Str::upper($subject);
    }

    public function uuid()
    {
        return (string) Str::uuid();
    }

    public function words()
    {
        $subject = strip_tags(ee()->TMPL->fetch_param('subject') ?: ee()->TMPL->tagdata);
        $count = ee()->TMPL->fetch_param('count');
        $prefix = ee()->TMPL->fetch_param('prefix', ' ...');

        return Str::words($subject, $count, $prefix);
    }
}