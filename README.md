AkismetComponent
================

Akismet Component for Yii Framework. Based on https://github.com/achingbrain/php5-akismet

# Introduction

This is a simple Yii Framework component that enables you use the Akismet anti-spam service in your yii application.

# Download

Check out the git repository:
```  
git clone git@github.com:chemezov/AkismetComponent.git
```

# Installation

Once you have cloned the repo (see Download, above) copy the files at ext.akismet.*.

Before you can use Akismet, you need a WordPress API key (they are free and getting one takes about five minutes).

Change your config file:
```php
// application components
'components'        => array(
  ...
  'akismet'       => array(
    'class'   => 'ext.akismet.AkismetComponent',
    'blogUrl' => 'your_blog_url',
    'apiKey'  => 'your_api_key',
  ),
  ...
)
```

# Documentation

See the [PHPDocs](http://achingbrain.github.com/maven-repo/documentation/php5-akismet/apidocs).

# Usage

```php
$akismet = Yii::app()->akismet;
$akismet->setCommentAuthor($name);
$akismet->setCommentAuthorEmail($email);
$akismet->setCommentAuthorURL($url);
$akismet->setCommentContent($comment);
$akismet->setPermalink('http://www.example.com/blog/alex/someurl/');

if($akismet->isCommentSpam())
  // store the comment but mark it as spam (in case of a mis-diagnosis)
else
  // store the comment normally
```

That's just about it. In the event that the filter wrongly tags messages, you can at a later date create a new object and populate it from your database, overriding fields where necessary and then use the following two methods to train it:

```php
$akismet->submitSpam();
```

and
```php
$akismet->submitHam();
```

to submit mis-diagnosed spam and ham, which improves the system for everybody. See the included documentation for a complete run-down of all available methods.

## Changelog

### Version 0.1

Initial release
